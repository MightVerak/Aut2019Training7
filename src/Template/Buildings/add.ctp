<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Building $building
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Buildings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="buildings form large-9 medium-8 columns content">
    <?= $this->Form->create($building) ?>
    <fieldset>
        <legend><?= __('Add Building') ?></legend>
        <?php
            echo $this->Form->control('building');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
