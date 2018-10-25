<?php
// src/Controller/ArticlesController.php

namespace App\Controller;
use App\Controller\AppController;
class ArticlesController extends AppController
{
     public function isAuthorized($user)
   {
       $action = $this->request->getParam('action');
    // add および tags アクションは、常にログインしているユーザーに許可されます。
    if (in_array($action, ['logout','add', 'tags','edit','delete','login'])) {
        return true;
    }

    // 他のすべてのアクションにはスラッグが必要です。
    $slug = $this->request->getParam('pass.0');
    if (!$slug) {
        return false;
    }

    // 記事が現在のユーザーに属していることを確認します。
    $article = $this->Articles->findBySlug($slug)->first();

    return $article->user_id === $user['id'];
    
    return false;
   }
     public function initialize()
    {
        parent::initialize();
    
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // FlashComponent をインクルード
        $this->Auth->allow(['tags']);
        $this->loadComponent('Markdown.Markdown');
    }
    public function index()
    {
        $this->loadComponent('Paginator');
        $articles = $this->Paginator->paginate($this->Articles->findByUserId($this->Auth->user('id')));
        $this->set(compact('articles'));
    }
    public function view($slug = null)
  {
    $article = $this->Articles->findBySlug($slug)->firstOrFail();
    $this->set(compact('article'));
  }
  public function add()
  { 
       $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            // user_id の決め打ちは一時的なもので、あとで認証を構築する際に削除されます。
            $article->user_id = $this->Auth->user('id');
            $md = file_get_contents('../README.md', true);
            $html = $this->Markdown->parse($md);
            if ($this->Articles->save($article,$html)) {
                $this->Flash->success(__('保存しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('保存できませんでした。'));
        }
        // タグのリストを取得
        $tags = $this->Articles->Tags->find('list');

        // ビューコンテキストに tags をセット
        $this->set('tags', $tags);

        $this->set('article', $article);
        $this->set(compact('html'));
    }
    
    public function edit($slug)
  {
    $article = $this->Articles
    ->findBySlug($slug)
    ->contain('Tags') // 関連づけられた Tags を読み込む
    ->firstOrFail();
    if ($this->request->is(['post', 'put'])) {
        $this->Articles->patchEntity($article, $this->request->getData(),[
            'accessibleFields' => ['user_id' => false]
            ]);
        if ($this->Articles->save($article)) {
            $this->Flash->success(__('更新しました。'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('更新できませんでした。'));
     }
     
     // タグのリストを取得
    $tags = $this->Articles->Tags->find('list');

    // ビューコンテキストに tags をセット
    $this->set('tags', $tags);

    $this->set('article', $article);
  }
  public function delete($slug)
  {
    $this->request->allowMethod(['post', 'delete']);

    $article = $this->Articles->findBySlug($slug)->firstOrFail();
    if ($this->Articles->delete($article)) {
        $this->Flash->success(__(' {0} を削除しました。', $article->title));
        return $this->redirect(['action' => 'index']);
    }
  }
  public function tags()
 {
    // 'pass' キーは CakePHP によって提供され、リクエストに渡された
    // 全ての URL パスセグメントを含みます。
    $tags = $this->request->getParam('pass');

    // ArticlesTable を使用してタグ付きの記事を検索します。
    $articles = $this->Articles->find('tagged', [
        'tags' => $tags
    ]);

    // 変数をビューテンプレートのコンテキストに渡します。
    $this->set([
        'articles' => $articles,
        'tags' => $tags
    ]);
  }
}
