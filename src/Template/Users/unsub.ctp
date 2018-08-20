<nav class="top-bar expanded" data-topbar role="navigation">
    <ul class="title-area large-3 medium-4 columns">
        <li class="name">
          <h1><?=$this->Html->link(__('オンラインmemo'),['controller'=>'articles','action'=>'index'])?></h1>
        </li>
    </ul>
 
     <div class="top-bar-section">
            <ul class="right">
                <li> <li><?= $this->Html->link(__('新規ユーザー登録'), ['controller' => 'users', 'action' => 'add']) ?></li></li>
                 <li> <li><?= $this->Html->link(__('パスワード変更'), ['controller' => 'users', 'action' => 'passet']) ?></li></li>
                  <li><?=$this->Html->link(__('ユーザー退会'),['controller'=>'users','action'=>'unsub'])?></a></li>
              	<li><?php if($this->request->getsession()->read('Auth.User.id')):
             	?>
			<a href="/users/logout">ログアウト</a></li>
          　<?php endif;?>
          
            </ul>
        </div>
</nav>
<div class="users form large-12 medium-12 columns content">
    <h3>ユーザー退会についての注意事項</h3>
    <p>登録されたユーザー情報は全て削除致します。</p>
    <br>
    <?= $this->Form->create() ?>
        <p>本当に退会しますか？</p>
        <br>
        <button>退会する</button>
        <p><?= $this->Html->link(__('キャンセル'),['controller'=>'articles','action'=>'index']) ?></p>
    <?= $this->Form->end() ?>