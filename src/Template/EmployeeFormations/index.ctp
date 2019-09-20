<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeeFormation[]|\Cake\Collection\CollectionInterface $employeeFormations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Employee Formation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employeeFormations index large-9 medium-8 columns content">
    <h3><?= __('Employee Formations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_done') ?></th>
                <th scope="col"><?= $this->Paginator->sort('note') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('formation_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employeeFormations as $employeeFormation): ?>
            <tr>
                <td><?= $this->Number->format($employeeFormation->id) ?></td>
                <td><?= h($employeeFormation->date_done) ?></td>
                <td><?= h($employeeFormation->note) ?></td>
                <td><?= $employeeFormation->has('employee') ? $this->Html->link($employeeFormation->employee->id, ['controller' => 'Employees', 'action' => 'view', $employeeFormation->employee->id]) : '' ?></td>
                <td><?= $employeeFormation->has('formation') ? $this->Html->link($employeeFormation->formation->title, ['controller' => 'Formations', 'action' => 'view', $employeeFormation->formation->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employeeFormation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employeeFormation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employeeFormation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeFormation->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
