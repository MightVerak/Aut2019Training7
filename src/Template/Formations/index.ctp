<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formation[]|\Cake\Collection\CollectionInterface $formations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Frequences'), ['controller' => 'Frequences', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Frequence'), ['controller' => 'Frequences', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Start Reminders'), ['controller' => 'StartReminders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Start Reminder'), ['controller' => 'StartReminders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modalities'), ['controller' => 'Modalities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modality'), ['controller' => 'Modalities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employee Formations'), ['controller' => 'EmployeeFormations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee Formation'), ['controller' => 'EmployeeFormations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Position Titles'), ['controller' => 'PositionTitles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Position Title'), ['controller' => 'PositionTitles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formations index large-9 medium-8 columns content">
    <h3><?= __('Formations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categorie_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('frequence_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_reminder_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modality_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('note') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formations as $formation): ?>
            <tr>
                <td><?= $this->Number->format($formation->id) ?></td>
                <td><?= h($formation->number) ?></td>
                <td><?= h($formation->title) ?></td>
                <td><?= $formation->has('category') ? $this->Html->link($formation->category->name, ['controller' => 'Categories', 'action' => 'view', $formation->category->id]) : '' ?></td>
                <td><?= $formation->has('frequence') ? $this->Html->link($formation->frequence->id, ['controller' => 'Frequences', 'action' => 'view', $formation->frequence->id]) : '' ?></td>
                <td><?= $formation->has('start_reminder') ? $this->Html->link($formation->start_reminder->id, ['controller' => 'StartReminders', 'action' => 'view', $formation->start_reminder->id]) : '' ?></td>
                <td><?= $formation->has('modality') ? $this->Html->link($formation->modality->id, ['controller' => 'Modalities', 'action' => 'view', $formation->modality->id]) : '' ?></td>
                <td><?= $this->Number->format($formation->duration) ?></td>
                <td><?= h($formation->note) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $formation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $formation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $formation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formation->id)]) ?>
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
