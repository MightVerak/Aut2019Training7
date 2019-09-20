<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Civilities Model
 *
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\HasMany $Employees
 *
 * @method \App\Model\Entity\Civility get($primaryKey, $options = [])
 * @method \App\Model\Entity\Civility newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Civility[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Civility|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Civility saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Civility patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Civility[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Civility findOrCreate($search, callable $callback = null, $options = [])
 */
class CivilitiesTable extends Table
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

        $this->setTable('civilities');
        $this->setDisplayField('civility');
        $this->setPrimaryKey('id');

        $this->hasMany('Employees', [
            'foreignKey' => 'civility_id'
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
            ->scalar('civility')
            ->maxLength('civility', 255)
            ->requirePresence('civility', 'create')
            ->notEmptyString('civility');

        return $validator;
    }
}
