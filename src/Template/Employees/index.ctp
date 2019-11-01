<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employees index large-9 medium-8 columns content">
    <h3><?= __('Employees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('civility_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('language_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cellular') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position_title_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('building_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supervisor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('more_info') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_sent_formation_plan') ?></th>
                <th scope="col"><?= $this->Paginator->sort('actif') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
            <tr>
            <td><?= h($employee->number) ?></td>
                <td><?= h($employee->civility->civility) ?></td>
                <td><?= h($employee->last_name) ?></td>
                <td><?= h($employee->first_name) ?></td>
                <td><?= h($employee->language->language) ?></td>
                <td><?= h($employee->cellular) ?></td>
                <td><?= h($employee->email) ?></td>
                <td><?= h($employee->position_title->position_title) ?></td>
                <td><?= h( $employee->building->building) ?></td>
                <td><?= h( $employee->supervisor->name) ?></td>
                <td><?= h($employee->more_info) ?></td>
                <td><?= h($employee->date_sent_formation_plan) ?></td>
                <td><?= $employee->actif ? __('Yes') : __('No'); ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?>
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
