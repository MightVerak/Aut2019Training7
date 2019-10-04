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
            <td><?= h($formation->category->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Frequence') ?></th>
            <td><?= h($formation->frequence->frequence) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Reminder') ?></th>
            <td><?= h($formation->start_reminder->start_reminder) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modality') ?></th>
            <td><?= h($formation->modality->modality) ?></td>
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
                
                <th scope="col"><?= __('Date Done') ?></th>
                <th scope="col"><?= __('Note') ?></th>
                <th scope="col"><?= __('Employee Id') ?></th>
                <th scope="col"><?= __('Formation Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($formation->employee_formations as $employeeFormations): ?>
            <tr>
                
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
