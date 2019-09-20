<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PositionTitle Entity
 *
 * @property int $id
 * @property string $position_title
 *
 * @property \App\Model\Entity\Employee[] $employees
 */
class PositionTitle extends Entity
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
        'position_title' => true,
        'employees' => true
    ];
}
