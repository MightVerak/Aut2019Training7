<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FormationsPositionTitle $formationsPositionTitle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formations Position Title'), ['action' => 'edit', $formationsPositionTitle->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formations Position Title'), ['action' => 'delete', $formationsPositionTitle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formationsPositionTitle->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formations Position Titles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formations Position Title'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Position Titles'), ['controller' => 'PositionTitles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Position Title'), ['controller' => 'PositionTitles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formation Statuses'), ['controller' => 'FormationStatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation Status'), ['controller' => 'FormationStatuses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formationsPositionTitles view large-9 medium-8 columns content">
    <h3><?= h($formationsPositionTitle->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Formation') ?></th>
            <td><?= $formationsPositionTitle->has('formation') ? $this->Html->link($formationsPositionTitle->formation->title, ['controller' => 'Formations', 'action' => 'view', $formationsPositionTitle->formation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position Title') ?></th>
            <td><?= $formationsPositionTitle->has('position_title') ? $this->Html->link($formationsPositionTitle->position_title->position_title, ['controller' => 'PositionTitles', 'action' => 'view', $formationsPositionTitle->position_title->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Formation Status') ?></th>
            <td><?= $formationsPositionTitle->has('formation_status') ? $this->Html->link($formationsPositionTitle->formation_status->id, ['controller' => 'FormationStatuses', 'action' => 'view', $formationsPositionTitle->formation_status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($formationsPositionTitle->id) ?></td>
        </tr>
    </table>
</div>
