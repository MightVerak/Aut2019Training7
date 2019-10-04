<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frequence $frequence
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $frequence->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $frequence->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Frequences'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="frequences form large-9 medium-8 columns content">
    <?= $this->Form->create($frequence) ?>
    <fieldset>
        <legend><?= __('Edit Frequence') ?></legend>
        <?php
            echo $this->Form->control('frequence');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
