<?php
    //ページタイトル変更
    $this->assign('title', 'パスワード変更 - オンラインwebメモ帳');
?>


    <h3>パスワード変更</h3>
    <p>入力されたメールアドレスに、再設定メールを送信します。<br>
    ユーザー登録されていない場合は送信出来ません。また、存在しないメールアドレスには正しく送信出来ませんので、ご了承下さい。</p>
    <?= $this->Form->create() ?>
        <?= $this->Form->control('email',['label' => 'メールアドレス']) ?><p>※半角英数</p>
        <button type='submit'>変更</button>
        <p><?= $this->Html->link('キャンセル',['controller'=>'articles','action'=>'index'])?></p>
    <?= $this->Form->end() ?>
</div>    