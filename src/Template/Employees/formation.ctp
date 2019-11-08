<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
use Cake\ORM\TableRegistry;
 $page = null;
ob_start();
?>
<!DOCTYPE html>
<html>
<img></img>
<h2>Plan de formation</h2>
<hr size="2" color="red">
<div class="employees view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Numéro de l\'employé:') ?></th>
            <td><?= h($employee->number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nom de l\'employé:') ?></th>
            <td><?= h($employee->civility->civility)." ".h($employee->first_name)." ".h($employee->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titre du poste') ?></th>
            <td><?= h($employee->position_title->position_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supervisor') ?></th>
            <td><?= h( $employee->supervisor->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Building') ?></th>
            <td><?= h( $employee->building->building) ?></td>
        </tr>
    </table>
    <div class="related">
        <?php if (!empty($employee->employee_formations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Formation') ?></th>
                <th scope="col"><?= __('Statut') ?></th>
                <th scope="col"><?= __('Fréquence') ?></th>
                <th scope="col"><?= __('Faite le') ?></th>
                <th scope="col"><?= __('Prévue le') ?></th>
                <th scope="col"><?= __('Expirée') ?></th>
                <th scope="col"><?= __('À venir') ?></th>
                <th scope="col"><?= __('À faire') ?></th>
                <th scope="col"><?= __('Jamais faite') ?></th>
            </tr>
            <?php foreach ($employee->employee_formations as $employeeFormations): ?>
            <?php $formation =  TableRegistry::get('Formations')->get($employeeFormations->formation_id, ['contain' => ['Categories' , 'Frequences']]); 
            $formationposition = TableRegistry::get('formationspositiontitles')->
            find()->
            where(['position_title_id' => $employee['position_title_id']]);
    
            $formationposition = $formationposition->first(); 
            $status =   TableRegistry::get('Formationstatuses')->get($formationposition->formation_status_id); ?>
            <tr>
                <td><?= h($formation->title) ?></td>
                <td><?= h($status->formation_status) ?></td>
                <td><?= h(TableRegistry::get('frequences')->get($formation->frequence_id)->frequence); ?></td>
                <td><?= h($employeeFormations->date_done) ?></td>
                <td><?= h($formation->formation_title) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
</html>
<?php
$page = ob_get_contents();
ob_end_flush();
$adress = $employee->email; 
$_SESSION['adress'] = $adress;
$_SESSION['page'] = $page;
?>
<?php echo $this->Form->create('Send', array('action'=>'mailPage'));
        echo$this->Form->button(__('Send'));
        echo $this->Form->end(); ?>


