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
    </ul>
</nav>
<div class="formations index large-9 medium-8 columns content">
    <h3><?= __('Formations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
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
                <td><?= h($formation->number) ?></td>
                <td><?= h($formation->title) ?></td>
                <td><?= h($formation->category->name) ?></td>
                <td><?= h($formation->frequence->frequence) ?></td>
                <td><?= h($formation->start_reminder->start_reminder) ?></td>
                <td><?= h($formation->modality->modality) ?></td>
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
