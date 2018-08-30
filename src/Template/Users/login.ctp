
<h1>シンプルなメモ帳とても簡単にできます！</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email',['label'=>'メールアドレス']) ?>
<?= $this->Form->control('password',['label'=>'パスワード']) ?>
<?= $this->Form->control('ログイン情報を保存', ['type' => 'checkbox']) ?>
<?= $this->Form->button('ログイン') ?>
<?= $this->Form->end() ?>
</div>