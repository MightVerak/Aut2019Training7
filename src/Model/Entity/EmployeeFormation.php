<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmployeeFormation Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate|null $date_done
 * @property string|null $note
 * @property int $employee_id
 * @property int $formation_id
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Formation $formation
 * @property \App\Model\Entity\Attachment[] $attachments
 */
class EmployeeFormation extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'date_done' => true,
        'note' => true,
        'employee_id' => true,
        'formation_id' => true,
        'employee' => true,
        'formation' => true,
        'attachments' => true
    ];
}
