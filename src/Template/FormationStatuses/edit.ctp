<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FormationStatus $formationStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $formationStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $formationStatus->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Formation Statuses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Formations Position Titles'), ['controller' => 'FormationsPositionTitles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formations Position Title'), ['controller' => 'FormationsPositionTitles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formationStatuses form large-9 medium-8 columns content">
    <?= $this->Form->create($formationStatus) ?>
    <fieldset>
        <legend><?= __('Edit Formation Status') ?></legend>
        <?php
            echo $this->Form->control('formation_status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
