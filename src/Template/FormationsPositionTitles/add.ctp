<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FormationsPositionTitle $formationsPositionTitle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Formations Position Titles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Position Titles'), ['controller' => 'PositionTitles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Position Title'), ['controller' => 'PositionTitles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formation Statuses'), ['controller' => 'FormationStatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation Status'), ['controller' => 'FormationStatuses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formationsPositionTitles form large-9 medium-8 columns content">
    <?= $this->Form->create($formationsPositionTitle) ?>
    <fieldset>
        <legend><?= __('Add Formations Position Title') ?></legend>
        <?php
            echo $this->Form->control('formation_id', ['options' => $formations]);
            echo $this->Form->control('position_title_id', ['options' => $positionTitles]);
            echo $this->Form->control('formation_status_id', ['options' => $formationStatuses]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
