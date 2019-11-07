<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeeFormation $employeeFormation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employee Formation'), ['action' => 'edit', $employeeFormation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee Formation'), ['action' => 'delete', $employeeFormation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeFormation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employee Formations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee Formation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employeeFormations view large-9 medium-8 columns content">
    <h3><?= h($employeeFormation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($employeeFormation->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employee') ?></th>
            <td><?= $employeeFormation->has('employee') ? $this->Html->link($employeeFormation->employee->id, ['controller' => 'Employees', 'action' => 'view', $employeeFormation->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Formation') ?></th>
            <td><?= $employeeFormation->has('formation') ? $this->Html->link($employeeFormation->formation->title, ['controller' => 'Formations', 'action' => 'view', $employeeFormation->formation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($employeeFormation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Done') ?></th>
            <td><?= h($employeeFormation->date_done) ?></td>
        </tr>
		<tr>
		<th scope="row"></th>
            <td><?= $this->Html->link('Add a file',['controller' => 'Attachments', 'action' => 'add', $employeeFormation->id],['class' => 'button', 'target' => '']) ?></td>
		
		</tr>
    </table>
</div>
