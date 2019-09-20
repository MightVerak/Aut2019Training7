<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PositionTitle $positionTitle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Position Titles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="positionTitles form large-9 medium-8 columns content">
    <?= $this->Form->create($positionTitle) ?>
    <fieldset>
        <legend><?= __('Add Position Title') ?></legend>
        <?php
            echo $this->Form->control('position_title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
