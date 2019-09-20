<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimeTable[]|\Cake\Collection\CollectionInterface $timeTables
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Time Table'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="timeTables index large-9 medium-8 columns content">
    <h3><?= __('Time Tables') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('time_select') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($timeTables as $timeTable): ?>
            <tr>
                <td><?= $this->Number->format($timeTable->id) ?></td>
                <td><?= h($timeTable->time_select) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $timeTable->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $timeTable->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $timeTable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeTable->id)]) ?>
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
