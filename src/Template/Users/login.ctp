
<h1>シンプルなメモ帳とても簡単にできます！</h1>
<div class="row">
    <div class="col-xs-6">
       <?= $this->Form->create() ?>
       <?= $this->Form->control('email',['label'=>'メールアドレス']) ?>
       <?= $this->Form->control('password',['label'=>'パスワード']) ?>
       <?= $this->Form->control('ログイン情報を保存', ['type' => 'checkbox']) ?>
       <?= $this->Form->button('ログイン') ?>
       <?= $this->Html->link(__('パスワードを忘れたらこちら'), ['controller' => 'users', 'action' => 'passet']) ?>
       <?= $this->Form->end() ?>  
    </div>
</div>