<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeesFormation $employeesFormation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Employees Formations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employeesFormations form large-9 medium-8 columns content">
    <?= $this->Form->create($employeesFormation) ?>
    <fieldset>
        <legend><?= __('Add Employees Formation') ?></legend>
        <?php
            echo $this->Form->control('date_done', ['empty' => true]);
            echo $this->Form->control('note');
            echo $this->Form->control('employee_id', ['options' => $employees]);
            echo $this->Form->control('formation_id', ['options' => $formations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
