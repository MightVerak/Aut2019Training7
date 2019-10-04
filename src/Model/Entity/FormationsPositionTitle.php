<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FormationsPositionTitle Entity
 *
 * @property int $id
 * @property int $formation_id
 * @property int $position_title_id
 * @property int $formation_status_id
 *
 * @property \App\Model\Entity\Formation $formation
 * @property \App\Model\Entity\PositionTitle $position_title
 * @property \App\Model\Entity\FormationStatus $formation_status
 */
class FormationsPositionTitle extends Entity
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
        'position_title_id' => true,
        'formation_status_id' => true,
        'formation' => true,
        'position_title' => true,
        'formation_status' => true
    ];
}
