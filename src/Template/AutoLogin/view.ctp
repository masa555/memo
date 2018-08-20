<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AutoLogin $autoLogin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Auto Login'), ['action' => 'edit', $autoLogin->user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Auto Login'), ['action' => 'delete', $autoLogin->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $autoLogin->user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Auto Login'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auto Login'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="autoLogin view large-9 medium-8 columns content">
    <h3><?= h($autoLogin->user_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Auto Login Key') ?></th>
            <td><?= h($autoLogin->auto_login_key) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($autoLogin->user_id) ?></td>
        </tr>
    </table>
</div>
