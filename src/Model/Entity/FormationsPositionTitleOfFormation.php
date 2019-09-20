<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FormationsPositionTitleOfFormation Entity
 *
 * @property int $formation_id
 * @property int $position_title_of_formations_id
 *
 * @property \App\Model\Entity\Formation $formation
 * @property \App\Model\Entity\PositionTitleOfFormation $position_title_of_formation
 */
class FormationsPositionTitleOfFormation extends Entity
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
        'formation_id' => true,
        'position_title_of_formations_id' => true,
        'formation' => true,
        'position_title_of_formation' => true
    ];
}
