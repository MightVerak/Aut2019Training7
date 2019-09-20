<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Formation Entity
 *
 * @property int $id
 * @property string $number
 * @property string $title
 * @property int $categorie_id
 * @property int $frequence_id
 * @property int $start_reminder_id
 * @property int $modality_id
 * @property float $duration
 * @property string|null $note
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Frequence $frequence
 * @property \App\Model\Entity\StartReminder $start_reminder
 * @property \App\Model\Entity\Modality $modality
 * @property \App\Model\Entity\EmployeeFormation[] $employee_formations
 * @property \App\Model\Entity\FormationsPositionTitleOfFormation[] $formations_position_title_of_formations
 * @property \App\Model\Entity\PositionTitleOfFormation[] $position_title_of_formations
 */
class Formation extends Entity
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
        'number' => true,
        'title' => true,
        'categorie_id' => true,
        'frequence_id' => true,
        'start_reminder_id' => true,
        'modality_id' => true,
        'duration' => true,
        'note' => true,
        'category' => true,
        'frequence' => true,
        'start_reminder' => true,
        'modality' => true,
        'employee_formations' => true,
        'formations_position_title_of_formations' => true,
        'position_title_of_formations' => true
    ];
}
