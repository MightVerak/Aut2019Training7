<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>

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
            <th scope="row"><?= __('Position Title') ?></th>
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
        <tr>
            <th scope="row"><?= __('Date Sent Formation Plan') ?></th>
            <td><?= h($employee->date_sent_formation_plan) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Actif') ?></th>
            <td><?= $employee->actif ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Employee Formations') ?></h4>
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
            <?php $formation = $formations->get($id, [
                'contain' => ['Categories,' 'Frequences']
            ]); ?>
            <tr>
                <td><?= h($employeeFormations->date_done) ?></td>
                <td><?= h($employeeFormations->note) ?></td>
                <td><?= h($employeeFormations->formation_title) ?></td>
                <td><?= h($employeeFormations->date_done) ?></td>
                <td><?= h($employeeFormations->formation_title) ?></td>
                <td><?= h($employeeFormations->formation_title) ?></td>
                <td><?= h($employeeFormations->formation_title) ?></td>
                <td><?= h($employeeFormations->formation_title) ?></td>
                <td><?= h($employeeFormations->formation_title) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>


