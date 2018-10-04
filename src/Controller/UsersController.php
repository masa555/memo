<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Event\Event;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
  public function beforeFilter(\Cake\Event\Event $event) {
	parent::beforeFilter($event);
	
	    $this->Auth->allow(['login']);
        $this->Auth->allow(['logout']);
        $this->Auth->allow(['add']);
        $this->Auth->allow(['index']);
        $this->Auth->allow(['view']);
        $this->Auth->allow(['Passet']);
        
        //記事情報も削除するために追加した
        $this->loadModel('Articles');
  }
     public function isAuthorized($user)
   {
       $action = $this->request->getParam('action');
    // add および tags アクションは、常にログインしているユーザーに許可されます。
    if (in_array($action, ['logout','add', 'tags','edit','delete', 'passet','unsub','auto_login','index'])) {
        return true;
    }
   }
    
     public function login()
{   
   if($this->request->is('post')){
		$user = $this->Auth->identify();
		//print_r($this->request);
		if($user){
		     if ($this->request->data('autologin') === '1') {
                    $this->__setupAutoLogin($user); 
		         
		     }
			$this->Auth->setUser($user);
			$this->Auth->user('id');
			$this->__setupAutoLogin($user);
			$this->Flash->success(__('ログインしました。'));
			return $this->redirect($this->Auth->redirectUrl('https://cakephp-masa55.c9users.io/articles'));
		}
		$this->Flash->error('メールアドレス、パスワードが不正です。');
      } 
}
 //ログアウト
    public function logout()
  {
   $this->__destroyAutoLogin($this->Auth->user());      
   $this->Flash->success(__('ログアウトしました。'));
	return $this->redirect($this->Auth->logout());
 }
 private function __setupAutoLogin($user)
    {
        $this->loadModel('AutoLogin');
        $autoLoginKey = sha1(uniqid() . mt_rand(1, 999999999) . '_auto_login');
        $entity = $this->AutoLogin->newEntity([
            'user_id' => $user['id'],
            'auto_login_key' => $autoLoginKey
        ]);
        $this->AutoLogin->save($entity);
         
        $this->Cookie->config([
            'expires' => '+7 days',
            'path' => '/'
        ]);
        $this->Cookie->write('AUTO_LOGIN', $autoLoginKey);
    }

    private function __destroyAutoLogin($user)
    {
        $this->loadModel('AutoLogin');
        try {
            $entity = $this->AutoLogin->get($user['id']);
            if ($entity) {
                $this->AutoLogin->delete($entity);
                $this->Cookie->delete('AUTO_LOGIN');
            }
        } catch (RecordNotFoundException $e) {
            $this->Cookie->delete('AUTO_LOGIN');
        }
    }
 
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * 
     * 
     */
     //パスワードリセット    
     public function passet()
    {
        if($this->request->is('post')){
              //DB上書きフラグ
             $save_flag = true;
            //POSTされたメールアドレスを取得
             $email = $this->request->getdata('email');
               
               //テーブルから、メールアドレスを元にユーザー情報を取り出す
             $user = $this->Users->find()->where(['Users.email' => $email])->first();
                        
             $status = null;
              //テーブルの値をセット
             if ($user != null) {
                $status = $user->status;
                $username = $user->username;
            }
                //メールアドレスがテーブル内に無い場合
             if ($user == null) {
                $this->Flash->error('メールアドレスを確認して下さい。');
                $save_flag = false;
            }
             //論理削除などのフラグが立っている場合
             if ($status != null) {
                $this->Flash->error('メールアドレスを確認して下さい。');
                $save_flag = false;
            }
                
                
            if ($save_flag == true) {
                //アルファベット小文字大文字、数字を配列に入れる
                $ar_all = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
                 //配列内の値をシャッフルする
                shuffle($ar_all); 
                 //8文字のランダムなパスワードを自動生成する
                $newpass = substr(implode($ar_all), 0, 8); 
                
                $user->password = $newpass;
                   //パスワード再設定メール送信
                $email = new Email('default');
                $email->setfrom(['tyutyumasato@gmail.com' => 'masato'])
                    ->setto($user->email)
                    ->setsubject('パスワード再設定完了')
                    ->send($username."\r\nパスワードが再設定されました。新しいパスワードは".$newpass."です。");
    
                    //usersテーブル更新
                $user = $this->Users->patchEntity($user, $this->request->getData());
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('パスワード再設定メールを送信しました。'));
                         return $this->redirect(['controller'=>'users','action' => 'login']);
                    }
                    $this->Flash->error(__('再設定メールを送信出来ませんでした。'));
            
                return $this->redirect(['controller'=>'users','action' => 'passet']);
                }
           } 
    } 

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Articles', 'AutoLogin']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
   public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $post_password = $this->request->getData('password');
            $post_password_check = $this->request->getData('password_check');
            
            
            if($post_password ===  $post_password_check ){
              if ($this->Users->save($user)) {
                $this->Flash->success(__('ユーザー登録しました')); 
                return $this->redirect(['controller'=>'users','action' => 'login']);
              }
              $errors = $user->errors();
              if(empty($errors)){
                  $this->redirect(['action'=>'login']);
              }else{
                  foreach($errors as $key => $error){
                      foreach($error as $error_messages){
                          $this->Flash->error($error_messages,['key'=>$key]);
                      }
                      unset($error);
                  }
              }
            }else
             {
            $this->Flash->error(__('パスワード又はメールアドレスが間違っています。'));
             }
        }
        $this->set(compact('user'));
    }
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('変更しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('変更できませんでした。'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
     //ユーザー退会
     public function unsub($id= null)
    {   
         $id = $this->Auth->user('id');
         //print_r($id);
         $user = $this->Users->find()->where(['Users.id' => $id])->first();
         //$user = $this->Users->findById(16);
         $user = $this->Users->newEntity();
         
         /*print_r($user);
         exit();*/
        if ($this->request->is('post')) {
            $article = $this->Users->patchEntity($user, $this->request->getData());
             $user = $this->Users->get($id);
        
            //ユーザーの記事情報削除
            $this->Articles->deleteAll(['user_id' => $user->id]);
            //ユーザー情報削除
          if ($this->Users->delete($user)) {
              
              $this->request->session()->destroy(); 
              $this->__destroyAutoLogin($this->Auth->user());    
              $this->Flash->success(__('退会しました。ご利用ありがとうございました。'));
              
              return $this->redirect(['controller'=>'users','action' => 'login']);
          } else {
            $this->Flash->error(__('退会できませんでした。'));
          }
        }
            $this->set(compact('user'));
            $this->set('_serialize', ['user']);
     }
    
}
