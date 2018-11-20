<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Event\Event;

use Cake\Datasource\Exception\RecordNotFoundException;

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
         $this->Auth->allow(['reset']);
        
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
		if($user){
		     if ($this->request->data('autologin') === '1') {
                    $this->__setupAutoLogin($user); 
		     }
			$this->Auth->setUser($user);
			$this->Auth->user('id');
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
            'expires' => '+7days',
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
        if ($this->request->is('post')) {
            $query = $this->Users->findByEmail($this->request->getData('email'));
            $user = $query->first();
            if (is_null($user)) {
                $this->Flash->error('メールアドレスを確認して下さい。');
            } else {
                $passkey = uniqid();
                $url = Router::Url(['controller' => 'users', 'action' => 'reset'], true) . '/' . $passkey;
                $timeout = time() + DAY;
                 if ($this->Users->updateAll(['passkey' => $passkey, 'timeout' => $timeout], ['id' => $user->id])){
                    $this->sendResetEmail($url, $user);
                    $this->redirect(['action' => 'login']);
                } else {
                    $this->Flash->error('メールアドレスがタイムアウトしました。');
                }
            }
        }
        
    }
     private function sendResetEmail($url, $user) {
      //パスワード再設定メール送信
        $email = new Email();
        $email->setTemplate('resetpw');
        $email->setEmailFormat('both');
        $email->setFrom(['simplememo.001@gmail.com' => 'シンプルメモ帳']);
        $email->setTo($user->email);
        $email->setSubject('パスワード変更');
        $email->setViewVars(['url' => $url, 'username' => $user->username]);
        if ($email->send()) {
            $this->Flash->success(__('パスワード変更メールを送りました。'));
        } else {
            $this->Flash->error(__('メールアドレスエラー ') . $email->smtpError);
        }
    }
    public function reset($passkey = null) {
        if ($passkey) {
            $query = $this->Users->find('all', ['conditions' => ['passkey' => $passkey, 'timeout >' => time()]]);
            $user = $query->first();
            if ($user) {
                if (!empty($this->request->getData())) {
                    // Clear passkey and timeout
                    $this->request->withData("passkey" ,"");
                    $this->request->withData("timeout" ,"");
                    $user = $this->Users->patchEntity($user, $this->request->getData());
                    if ($this->Users->save($user)) {
                        $this->Flash->set(__('パスワードを変更しました。'));
                        return $this->redirect(array('action' => 'login'));
                    } else {
                        $this->Flash->error(__('パスワード更新が失敗しました。'));
                    }
                }
            } else {
                $this->Flash->error('パスワードキーが無効または期限切れです。あなたのメールアドレスを確認するか、もう一度お試しください');
                $this->redirect(['action' => 'passet']);
            }
            unset($user->password);
            $this->set(compact('user'));
        } else {
            $this->redirect('/');
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
         $email = new Email('default');
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
            $this->Flash->error(__('パスワードまたはメールアドレスが間違っています。'));
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
