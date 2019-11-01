<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formation $formation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formation'), ['action' => 'edit', $formation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formation'), ['action' => 'delete', $formation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="formations view large-9 medium-8 columns content">
    <h3><?= h($formation->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Number') ?></th>
            <td><?= h($formation->number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($formation->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $formation->has('category') ? $this->Html->link($formation->category->name, ['controller' => 'Categories', 'action' => 'view', $formation->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Frequence') ?></th>
            <td><?= $formation->has('frequence') ? $this->Html->link($formation->frequence->frequence, ['controller' => 'Frequences', 'action' => 'view', $formation->frequence->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Reminder') ?></th>
            <td><?= $formation->has('start_reminder') ? $this->Html->link($formation->start_reminder->start_reminder, ['controller' => 'StartReminders', 'action' => 'view', $formation->start_reminder->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modality') ?></th>
            <td><?= $formation->has('modality') ? $this->Html->link($formation->modality->modality, ['controller' => 'Modalities', 'action' => 'view', $formation->modality->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($formation->note) ?></td>
        </tr>
       
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= $this->Number->format($formation->duration) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Employees') ?></h4>
        <?php if (!empty($formation->employees)): ?>
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
            <?php foreach ($formation->employees as $employees): ?>
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
    <div class="related">
        <h4><?= __('Related Position Titles') ?></h4>
        <?php if (!empty($formation->position_titles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Position Title') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($formation->position_titles as $positionTitles): ?>
            <tr>
                <td><?= h($positionTitles->id) ?></td>
                <td><?= h($positionTitles->position_title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PositionTitles', 'action' => 'view', $positionTitles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PositionTitles', 'action' => 'edit', $positionTitles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PositionTitles', 'action' => 'delete', $positionTitles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $positionTitles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
