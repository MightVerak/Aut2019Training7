<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FormationStatus Entity
 *
 * @property int $id
 * @property string $formation_status
 *
 * @property \App\Model\Entity\FormationsPositionTitle[] $formations_position_titles
 */
class FormationStatus extends Entity
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
        'formation_status' => true,
        'formations_position_titles' => true
    ];
}
