<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attachment $attachment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Attachment'), ['action' => 'edit', $attachment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attachment'), ['action' => 'delete', $attachment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employee Formations'), ['controller' => 'EmployeeFormations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee Formation'), ['controller' => 'EmployeeFormations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="attachments view large-9 medium-8 columns content">
    <h3><?= h($attachment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($attachment->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Path') ?></th>
            <td><?= h($attachment->path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($attachment->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employee Formation') ?></th>
            <td><?= $attachment->has('employee_formation') ? $this->Html->link($attachment->employee_formation->id, ['controller' => 'EmployeeFormations', 'action' => 'view', $attachment->employee_formation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($attachment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Load Date') ?></th>
            <td><?= h($attachment->load_date) ?></td>
        </tr>
    </table>
</div>
