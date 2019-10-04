<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FormationsPositionTitle[]|\Cake\Collection\CollectionInterface $formationsPositionTitles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Formations Position Title'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Position Titles'), ['controller' => 'PositionTitles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Position Title'), ['controller' => 'PositionTitles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formation Statuses'), ['controller' => 'FormationStatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation Status'), ['controller' => 'FormationStatuses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formationsPositionTitles index large-9 medium-8 columns content">
    <h3><?= __('Formations Position Titles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('formation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position_title_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('formation_status_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formationsPositionTitles as $formationsPositionTitle): ?>
            <tr>
                <td><?= $this->Number->format($formationsPositionTitle->id) ?></td>
                <td><?= $formationsPositionTitle->has('formation') ? $this->Html->link($formationsPositionTitle->formation->title, ['controller' => 'Formations', 'action' => 'view', $formationsPositionTitle->formation->id]) : '' ?></td>
                <td><?= $formationsPositionTitle->has('position_title') ? $this->Html->link($formationsPositionTitle->position_title->position_title, ['controller' => 'PositionTitles', 'action' => 'view', $formationsPositionTitle->position_title->id]) : '' ?></td>
                <td><?= $formationsPositionTitle->has('formation_status') ? $this->Html->link($formationsPositionTitle->formation_status->id, ['controller' => 'FormationStatuses', 'action' => 'view', $formationsPositionTitle->formation_status->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $formationsPositionTitle->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $formationsPositionTitle->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $formationsPositionTitle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formationsPositionTitle->id)]) ?>
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
