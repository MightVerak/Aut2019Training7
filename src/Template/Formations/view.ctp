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
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Frequences'), ['controller' => 'Frequences', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Frequence'), ['controller' => 'Frequences', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Start Reminders'), ['controller' => 'StartReminders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Start Reminder'), ['controller' => 'StartReminders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modalities'), ['controller' => 'Modalities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modality'), ['controller' => 'Modalities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employee Formations'), ['controller' => 'EmployeeFormations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee Formation'), ['controller' => 'EmployeeFormations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Position Titles'), ['controller' => 'PositionTitles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Position Title'), ['controller' => 'PositionTitles', 'action' => 'add']) ?> </li>
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
            <td><?= $formation->has('frequence') ? $this->Html->link($formation->frequence->id, ['controller' => 'Frequences', 'action' => 'view', $formation->frequence->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Reminder') ?></th>
            <td><?= $formation->has('start_reminder') ? $this->Html->link($formation->start_reminder->id, ['controller' => 'StartReminders', 'action' => 'view', $formation->start_reminder->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modality') ?></th>
            <td><?= $formation->has('modality') ? $this->Html->link($formation->modality->id, ['controller' => 'Modalities', 'action' => 'view', $formation->modality->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($formation->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($formation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= $this->Number->format($formation->duration) ?></td>
        </tr>
    </table>
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
    <div class="related">
        <h4><?= __('Related Employee Formations') ?></h4>
        <?php if (!empty($formation->employee_formations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Date Done') ?></th>
                <th scope="col"><?= __('Note') ?></th>
                <th scope="col"><?= __('Employee Id') ?></th>
                <th scope="col"><?= __('Formation Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($formation->employee_formations as $employeeFormations): ?>
            <tr>
                <td><?= h($employeeFormations->id) ?></td>
                <td><?= h($employeeFormations->date_done) ?></td>
                <td><?= h($employeeFormations->note) ?></td>
                <td><?= h($employeeFormations->employee_id) ?></td>
                <td><?= h($employeeFormations->formation_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EmployeeFormations', 'action' => 'view', $employeeFormations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EmployeeFormations', 'action' => 'edit', $employeeFormations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EmployeeFormations', 'action' => 'delete', $employeeFormations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeFormations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
