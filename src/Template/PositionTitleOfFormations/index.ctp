<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PositionTitleOfFormation[]|\Cake\Collection\CollectionInterface $positionTitleOfFormations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Position Title Of Formation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="positionTitleOfFormations index large-9 medium-8 columns content">
    <h3><?= __('Position Title Of Formations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($positionTitleOfFormations as $positionTitleOfFormation): ?>
            <tr>
                <td><?= $this->Number->format($positionTitleOfFormation->id) ?></td>
                <td><?= h($positionTitleOfFormation->title) ?></td>
                <td><?= $this->Number->format($positionTitleOfFormation->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $positionTitleOfFormation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $positionTitleOfFormation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $positionTitleOfFormation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $positionTitleOfFormation->id)]) ?>
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
