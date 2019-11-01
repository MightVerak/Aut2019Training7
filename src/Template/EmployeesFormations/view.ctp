<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeesFormation $employeesFormation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employees Formation'), ['action' => 'edit', $employeesFormation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employees Formation'), ['action' => 'delete', $employeesFormation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeesFormation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employees Formations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employees Formation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employeesFormations view large-9 medium-8 columns content">
    <h3><?= h($employeesFormation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($employeesFormation->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employee') ?></th>
            <td><?= $employeesFormation->has('employee') ? $this->Html->link($employeesFormation->employee->id, ['controller' => 'Employees', 'action' => 'view', $employeesFormation->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Formation') ?></th>
            <td><?= $employeesFormation->has('formation') ? $this->Html->link($employeesFormation->formation->title, ['controller' => 'Formations', 'action' => 'view', $employeesFormation->formation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($employeesFormation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Done') ?></th>
            <td><?= h($employeesFormation->date_done) ?></td>
        </tr>
    </table>
</div>
