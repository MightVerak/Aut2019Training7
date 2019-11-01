<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Building $building
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Building'), ['action' => 'edit', $building->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Building'), ['action' => 'delete', $building->id], ['confirm' => __('Are you sure you want to delete # {0}?', $building->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Buildings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Building'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="buildings view large-9 medium-8 columns content">
    <h3><?= h($building->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Building') ?></th>
            <td><?= h($building->building) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($building->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Employees') ?></h4>
        <?php if (!empty($building->employees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Number') ?></th>
                <th scope="col"><?= __('Civility Id') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Language Id') ?></th>
                <th scope="col"><?= __('Cellular') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Position Title Id') ?></th>
                <th scope="col"><?= __('Building Id') ?></th>
                <th scope="col"><?= __('Supervisor Id') ?></th>
                <th scope="col"><?= __('More Info') ?></th>
                <th scope="col"><?= __('Date Sent Formation Plan') ?></th>
                <th scope="col"><?= __('Actif') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($building->employees as $employees): ?>
            <tr>
                <td><?= h($employees->id) ?></td>
                <td><?= h($employees->number) ?></td>
                <td><?= h($employees->civility_id) ?></td>
                <td><?= h($employees->last_name) ?></td>
                <td><?= h($employees->first_name) ?></td>
                <td><?= h($employees->language_id) ?></td>
                <td><?= h($employees->cellular) ?></td>
                <td><?= h($employees->email) ?></td>
                <td><?= h($employees->position_title_id) ?></td>
                <td><?= h($employees->building_id) ?></td>
                <td><?= h($employees->supervisor_id) ?></td>
                <td><?= h($employees->more_info) ?></td>
                <td><?= h($employees->date_sent_formation_plan) ?></td>
                <td><?= h($employees->actif) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Employees', 'action' => 'view', $employees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Employees', 'action' => 'edit', $employees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employees', 'action' => 'delete', $employees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
