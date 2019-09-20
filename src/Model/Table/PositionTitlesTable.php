<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PositionTitles Model
 *
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\HasMany $Employees
 *
 * @method \App\Model\Entity\PositionTitle get($primaryKey, $options = [])
 * @method \App\Model\Entity\PositionTitle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PositionTitle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PositionTitle|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PositionTitle saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PositionTitle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PositionTitle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PositionTitle findOrCreate($search, callable $callback = null, $options = [])
 */
class PositionTitlesTable extends Table
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

        $this->setTable('position_titles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Employees', [
            'foreignKey' => 'position_title_id'
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
            ->scalar('position_title')
            ->maxLength('position_title', 255)
            ->requirePresence('position_title', 'create')
            ->notEmptyString('position_title');

        return $validator;
    }
}
