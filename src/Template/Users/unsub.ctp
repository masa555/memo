
    <h3>ユーザー退会についての注意事項</h3>
    <p>登録されたユーザー情報は全て削除致します。</p>
    <br>
    <?= $this->Form->create() ?>
        <p>本当に退会しますか？</p>
        <br>
        <button>退会する</button>
        <p><?= $this->Html->link(__('キャンセル'),['controller'=>'articles','action'=>'index']) ?></p>
    <?= $this->Form->end() ?>