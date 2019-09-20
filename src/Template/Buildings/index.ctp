<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Building[]|\Cake\Collection\CollectionInterface $buildings
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Building'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="buildings index large-9 medium-8 columns content">
    <h3><?= __('Buildings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('building') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($buildings as $building): ?>
            <tr>
                <td><?= $this->Number->format($building->id) ?></td>
                <td><?= h($building->building) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $building->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $building->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $building->id], ['confirm' => __('Are you sure you want to delete # {0}?', $building->id)]) ?>
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
