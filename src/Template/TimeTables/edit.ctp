<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimeTable $timeTable
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $timeTable->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $timeTable->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Time Tables'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="timeTables form large-9 medium-8 columns content">
    <?= $this->Form->create($timeTable) ?>
    <fieldset>
        <legend><?= __('Edit Time Table') ?></legend>
        <?php
            echo $this->Form->control('time_select');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
