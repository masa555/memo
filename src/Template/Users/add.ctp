<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!-- ページナビの生成 -->
<nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href="#">オンラインmemo <?=$this->Html->image('#',array('width'=>'20','height'=>'20')); ?></a></h1>
            </li>
        </ul>
</nav>
<!-- ユーザー登録フォーム生成 -->
<div class="users form large-12 medium-12 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
    <h3>ユーザー登録</h3>
        <?php
            echo $this->Form->control('email',['label' => 'メールアドレス（認証用ID）']);
            echo $this->Form->control('password',['label' => 'パスワード']);
            echo$this->Form->label('password_check','パスワード（確認)');
            echo $this->Form->password('password_check');
            echo $this->Form->control('name',['label' => 'ユーザー名（表示用）']);
            
        ?>    
    <?= $this->Form->button(__('登録')) ?>
    <?= $this->Html->link(__('キャンセル'), ['controller' => 'users', 'action' => 'login']) ?>
    <?= $this->Form->end() ?>
</div>