<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeeFormation $employeeFormation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employee Formation'), ['action' => 'edit', $employeeFormation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee Formation'), ['action' => 'delete', $employeeFormation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeFormation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employee Formations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="employeeFormations view large-9 medium-8 columns content">
    <h3><?= h($employeeFormation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($employeeFormation->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employee') ?></th>
            <td><?= $employeeFormation->has('employee') ? $this->Html->link($employeeFormation->employee->number, ['controller' => 'Employees', 'action' => 'view', $employeeFormation->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Formation') ?></th>
            <td><?= $employeeFormation->has('formation') ? $this->Html->link($employeeFormation->formation->title, ['controller' => 'Formations', 'action' => 'view', $employeeFormation->formation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Done') ?></th>
            <td><?= h($employeeFormation->date_done) ?></td>
        </tr>
		<tr>
		<th scope="row"></th>
            <td><?= $this->Html->link('Add a file',['controller' => 'Attachments', 'action' => 'add', $employeeFormation->id],['class' => 'button', 'target' => '']) ?></td>
		
		</tr>
    </table>
    <div class="related">
        <h4><?= __('Related Attachments') ?></h4>
        <?php if (!empty($employeeFormation->attachments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
             
                <th scope="col"><?= __('Name') ?></th>
               
                <th scope="col"><?= __('Load Date') ?></th>
                <th scope="col"><?= __('Note') ?></th>
            
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employeeFormation->attachments as $attachments): ?>
            <tr>
          
               <td><?= $this->Html->link($attachments->name, ['controller' => 'Attachments', 'action' => 'download', $attachments->id]) ?></td>
              
                <td><?= h($attachments->load_date) ?></td>
                <td><?= h($attachments->note) ?></td>
               
                <td class="actions">
                    <?= $this->Html->link('download', ['controller' => 'Attachments', 'action' => 'Download', $attachments->id]) ?>
                    
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Attachments', 'action' => 'delete', $attachments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
