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
                <h1><a href="#">オンライmemo<?=$this->Html->image('#',array('width'=>'20','height'=>'20')); ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">

                <li> <li><?= $this->Html->link('メモ帳', ['controller'=>'articles','action' => 'index']) ?></li></li>
                 <?= $this->Html->link(__('編集'), ['action' => 'edit', $user->id]) ?>

                <li><a href="#">退会</a></li>
                <li>  <li><?= $this->Html->link('ログアウト', ['controller'=>'users','action' => 'logout']) ?></li></li>
            </ul>
        </div>
</nav>
<div class="users view large-12 medium-12 columns content">
     <h3>ユーザー情報閲覧</h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('メールアドレス') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('パスワード') ?></th>
            <td><?= h('***********************') ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('名前') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('作成日') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('更新日') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
</div>
