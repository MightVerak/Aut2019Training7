<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TimeTables Model
 *
 * @method \App\Model\Entity\TimeTable get($primaryKey, $options = [])
 * @method \App\Model\Entity\TimeTable newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TimeTable[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TimeTable|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimeTable saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimeTable patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TimeTable[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TimeTable findOrCreate($search, callable $callback = null, $options = [])
 */
class TimeTablesTable extends Table
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

        $this->setTable('time_tables');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('time_select')
            ->maxLength('time_select', 255)
            ->requirePresence('time_select', 'create')
            ->notEmptyString('time_select');

        return $validator;
    }
}
