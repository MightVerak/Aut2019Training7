<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Civility $civility
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $civility->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $civility->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Civilities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="civilities form large-9 medium-8 columns content">
    <?= $this->Form->create($civility) ?>
    <fieldset>
        <legend><?= __('Edit Civility') ?></legend>
        <?php
            echo $this->Form->control('civility');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
