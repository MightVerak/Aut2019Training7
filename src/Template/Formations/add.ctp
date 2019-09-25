<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formation $formation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Frequences'), ['controller' => 'Frequences', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Frequence'), ['controller' => 'Frequences', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Start Reminders'), ['controller' => 'StartReminders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Start Reminder'), ['controller' => 'StartReminders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modalities'), ['controller' => 'Modalities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modality'), ['controller' => 'Modalities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employee Formations'), ['controller' => 'EmployeeFormations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee Formation'), ['controller' => 'EmployeeFormations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Position Titles'), ['controller' => 'PositionTitles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Position Title'), ['controller' => 'PositionTitles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formations form large-9 medium-8 columns content">
    <?= $this->Form->create($formation) ?>
    <fieldset>
        <legend><?= __('Add Formation') ?></legend>
        <?php
            echo $this->Form->control('number');
            echo $this->Form->control('title');
            echo $this->Form->control('categorie_id', ['options' => $categories]);
            echo $this->Form->control('frequence_id', ['options' => $frequences]);
            echo $this->Form->control('start_reminder_id', ['options' => $startReminders]);
            echo $this->Form->control('modality_id', ['options' => $modalities]);
            echo $this->Form->control('duration');
            echo $this->Form->control('note');
            echo $this->Form->control('position_titles._ids', ['options' => $positionTitles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
