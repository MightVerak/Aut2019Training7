<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PositionTitleOfFormation $positionTitleOfFormation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Position Title Of Formations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="positionTitleOfFormations form large-9 medium-8 columns content">
    <?= $this->Form->create($positionTitleOfFormation) ?>
    <fieldset>
        <legend><?= __('Add Position Title Of Formation') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('status');
            echo $this->Form->control('formations._ids', ['options' => $formations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
