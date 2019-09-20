<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimeTable $timeTable
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Time Table'), ['action' => 'edit', $timeTable->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Time Table'), ['action' => 'delete', $timeTable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeTable->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Time Tables'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Time Table'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="timeTables view large-9 medium-8 columns content">
    <h3><?= h($timeTable->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Time Select') ?></th>
            <td><?= h($timeTable->time_select) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($timeTable->id) ?></td>
        </tr>
    </table>
</div>
