<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StartReminder $startReminder
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Start Reminders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="startReminders form large-9 medium-8 columns content">
    <?= $this->Form->create($startReminder) ?>
    <fieldset>
        <legend><?= __('Add Start Reminder') ?></legend>
        <?php
            echo $this->Form->control('start_reminder');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
