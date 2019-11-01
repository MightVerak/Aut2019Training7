<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
  
        <li><?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employees view large-9 medium-8 columns content">
    <h3><?= h($employee->id) ?></h3>
    <table class="vertical-table">
    <tr>
            <th scope="row"><?= __('Number') ?></th>
            <td><?= h($employee->number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Civility') ?></th>
            <td><?= h($employee->civility->civility) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($employee->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($employee->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language') ?></th>
            <td><?= h($employee->language->language) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($employee->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position Title') ?></th>
            <td><?= h($employee->position_title->position_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Building') ?></th>
            <td><?= h( $employee->building->building) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supervisor') ?></th>
            <td><?= h( $employee->supervisor->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('More Info') ?></th>
            <td><?= h($employee->more_info) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cellular') ?></th>
            <td><?= h($employee->cellular) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Sent Formation Plan') ?></th>
            <td><?= h($employee->date_sent_formation_plan) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Actif') ?></th>
            <td><?= $employee->actif ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Formations') ?></h4>
        <?php if (!empty($employee->formations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
               
                <th scope="col"><?= __('Number') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Categorie Id') ?></th>
                <th scope="col"><?= __('Frequence Id') ?></th>
                <th scope="col"><?= __('Start Reminder Id') ?></th>
                <th scope="col"><?= __('Modality Id') ?></th>
                <th scope="col"><?= __('Duration') ?></th>
                <th scope="col"><?= __('Note') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employee->formations as $formations): ?>
            <tr>
               
                <td><?= h($formations->number) ?></td>
                <td><?= h($formations->title) ?></td>
                <td><?= h($formations->categorie_id) ?></td>
                <td><?= h($formations->frequence_id) ?></td>
                <td><?= h($formations->start_reminder_id) ?></td>
                <td><?= h($formations->modality_id) ?></td>
                <td><?= h($formations->duration) ?></td>
                <td><?= h($formations->note) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Formations', 'action' => 'view', $formations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Formations', 'action' => 'edit', $formations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Formations', 'action' => 'delete', $formations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
