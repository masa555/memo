<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AutoLogin $autoLogin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $autoLogin->user_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $autoLogin->user_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Auto Login'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="autoLogin form large-9 medium-8 columns content">
    <?= $this->Form->create($autoLogin) ?>
    <fieldset>
        <legend><?= __('Edit Auto Login') ?></legend>
        <?php
            echo $this->Form->control('auto_login_key');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
