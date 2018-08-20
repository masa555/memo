<?php
    //ページタイトル変更
    $this->assign('title', 'パスワード変更 - オンラインwebメモ帳');
?>

<!-- ページナビの生成 -->
<nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href="#">オンラインmemo <?=$this->Html->image('#',array('width'=>'20','height'=>'20')); ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><?=$this->Html->link(__('ログイン'),['controller'=>'users','action'=>'login'])?></a></li>
                <li><?=$this->Html->link(__('新規ユーザー登録'),['controller'=>'users','action'=>'add'])?></a></li>
               
            </ul>
        </div>
</nav>
<!-- パスワード再設定 -->
<div class="users form large-12 medium-12 columns content">
    <h3>パスワード変更</h3>
    <p>入力されたメールアドレスに、再設定メールを送信します。<br>
    ユーザー登録されていない場合は送信出来ません。また、存在しないメールアドレスには正しく送信出来ませんので、ご了承下さい。</p>
    <?= $this->Form->create() ?>
        <?= $this->Form->control('email',['label' => 'メールアドレス']) ?><p>※半角英数</p>
        <button type='submit'>変更</button>
        <p><?= $this->Html->link('キャンセル',['controller'=>'articles','action'=>'index'])?></p>
    <?= $this->Form->end() ?>
</div>    