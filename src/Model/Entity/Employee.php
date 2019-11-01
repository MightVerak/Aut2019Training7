<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property string $number
 * @property int $civility_id
 * @property string $last_name
 * @property string $first_name
 * @property int $language_id
 * @property string|null $cellular
 * @property string $email
 * @property int $position_title_id
 * @property int $building_id
 * @property int $supervisor_id
 * @property string|null $more_info
 * @property \Cake\I18n\FrozenDate|null $date_sent_formation_plan
 * @property bool|null $actif
 *
 * @property \App\Model\Entity\Civility $civility
 * @property \App\Model\Entity\Language $language
 * @property \App\Model\Entity\PositionTitle $position_title
 * @property \App\Model\Entity\Building $building
 * @property \App\Model\Entity\Supervisor $supervisor
 * @property \App\Model\Entity\Formation[] $formations
 */
class Employee extends Entity
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
        'civility_id' => true,
        'last_name' => true,
        'first_name' => true,
        'language_id' => true,
        'cellular' => true,
        'email' => true,
        'position_title_id' => true,
        'building_id' => true,
        'supervisor_id' => true,
        'more_info' => true,
        'date_sent_formation_plan' => true,
        'actif' => true,
        'civility' => true,
        'language' => true,
        'position_title' => true,
        'building' => true,
        'supervisor' => true,
        'formations' => true
    ];
}
