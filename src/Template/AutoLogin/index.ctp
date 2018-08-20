<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AutoLogin[]|\Cake\Collection\CollectionInterface $autoLogin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Auto Login'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="autoLogin index large-9 medium-8 columns content">
    <h3><?= __('Auto Login') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('auto_login_key') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($autoLogin as $autoLogin): ?>
            <tr>
                <td><?= $this->Number->format($autoLogin->user_id) ?></td>
                <td><?= h($autoLogin->auto_login_key) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $autoLogin->user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $autoLogin->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $autoLogin->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $autoLogin->user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
