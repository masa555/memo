<nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href='#'>オンラインmoemo <?=$this->Html->image('#',array('width'=>'20','height'=>'20')); ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
               <li><?php if($this->request->getsession()->read('Auth.User.id')):
             	?>
			<a href="/users/logout">ログアウト</a></li>
			
          　<?php endif;?>
                <li> <li><?= $this->Html->link(__('ユーザー登録'), ['controller' => 'users', 'action' => 'add']) ?></li></li>
            </ul>
        </div>
</nav>
<div class="users form large-12 medium-12 columns content">
<h1>メモ帳の編集</h1>
<?php
    echo $this->Form->create($article);
    echo $this->Form->control('user_id', ['type' => 'hidden']);
    echo $this->Form->control('title',['label' => 'タイトル']);
    echo $this->Form->control('body', ['label' => '本文']);
    echo $this->Form->control('tag_string', ['type' => 'text']);
    echo $this->Form->button(__('更新'));
    echo $this->Form->end();
?>