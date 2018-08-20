 <nav class="top-bar expanded" data-topbar role="navigation">
    <ul class="title-area large-3 medium-4 columns">
        <li class="name">
          <h1><?=$this->Html->link(__('オンラインmemo'),['controller'=>'articles','action'=>'index'])?></h1>
        </li>
    </ul>
 
    <div class="top-bar-section">
        <ul class="right">
    　    
      <li><?= $this->Html->link(__('新規ユーザー登録（無料）'), ['controller' => 'users', 'action' => 'add']) ?></li>
      <li><?=$this->Html->link(__('パスワード変更'),['controller'=>'users','action'=>'passet'])?></li>
        </ul>
    </div>
</nav>
 <div class="users form large-12 medium-12 columns content">
<h1>シンプルなメモ帳とても簡単にできます！</h1>
<h3>ログイン</h3>
<?= $this->Form->create() ?>
<?= $this->Form->control('email',['label'=>'メールアドレス']) ?>
<?= $this->Form->control('password',['label'=>'パスワード']) ?>
<?= $this->Form->control('ログイン情報を保存', ['type' => 'checkbox']) ?>
<?= $this->Form->button('ログイン') ?>
<?= $this->Form->end() ?>