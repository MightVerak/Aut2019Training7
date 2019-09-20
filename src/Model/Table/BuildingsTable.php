<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Buildings Model
 *
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\HasMany $Employees
 *
 * @method \App\Model\Entity\Building get($primaryKey, $options = [])
 * @method \App\Model\Entity\Building newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Building[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Building|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Building saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Building patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Building[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Building findOrCreate($search, callable $callback = null, $options = [])
 */
class BuildingsTable extends Table
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

        $this->setTable('buildings');
        $this->setDisplayField('building');
        $this->setPrimaryKey('id');

        $this->hasMany('Employees', [
            'foreignKey' => 'building_id'
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
            ->scalar('building')
            ->maxLength('building', 255)
            ->requirePresence('building', 'create')
            ->notEmptyString('building');

        return $validator;
    }
}
