<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FormationStatus $formationStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formation Status'), ['action' => 'edit', $formationStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formation Status'), ['action' => 'delete', $formationStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formationStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formation Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations Position Titles'), ['controller' => 'FormationsPositionTitles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formations Position Title'), ['controller' => 'FormationsPositionTitles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formationStatuses view large-9 medium-8 columns content">
    <h3><?= h($formationStatus->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Formation Status') ?></th>
            <td><?= h($formationStatus->formation_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($formationStatus->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Formations Position Titles') ?></h4>
        <?php if (!empty($formationStatus->formations_position_titles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Formation Id') ?></th>
                <th scope="col"><?= __('Position Title Id') ?></th>
                <th scope="col"><?= __('Formation Status Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($formationStatus->formations_position_titles as $formationsPositionTitles): ?>
            <tr>
                <td><?= h($formationsPositionTitles->id) ?></td>
                <td><?= h($formationsPositionTitles->formation_id) ?></td>
                <td><?= h($formationsPositionTitles->position_title_id) ?></td>
                <td><?= h($formationsPositionTitles->formation_status_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FormationsPositionTitles', 'action' => 'view', $formationsPositionTitles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FormationsPositionTitles', 'action' => 'edit', $formationsPositionTitles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FormationsPositionTitles', 'action' => 'delete', $formationsPositionTitles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formationsPositionTitles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
