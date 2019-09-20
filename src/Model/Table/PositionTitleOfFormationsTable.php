<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PositionTitleOfFormations Model
 *
 * @property \App\Model\Table\FormationsTable&\Cake\ORM\Association\BelongsToMany $Formations
 *
 * @method \App\Model\Entity\PositionTitleOfFormation get($primaryKey, $options = [])
 * @method \App\Model\Entity\PositionTitleOfFormation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PositionTitleOfFormation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PositionTitleOfFormation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PositionTitleOfFormation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PositionTitleOfFormation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PositionTitleOfFormation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PositionTitleOfFormation findOrCreate($search, callable $callback = null, $options = [])
 */
class PositionTitleOfFormationsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('position_title_of_formations');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Formations', [
            'foreignKey' => 'position_title_of_formation_id',
            'targetForeignKey' => 'formation_id',
            'joinTable' => 'formations_position_title_of_formations'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        return $validator;
    }
}
