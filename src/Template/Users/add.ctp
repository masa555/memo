
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