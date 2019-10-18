<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employees Model
 *
 * @property \App\Model\Table\CivilitiesTable&\Cake\ORM\Association\BelongsTo $Civilities
 * @property \App\Model\Table\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 * @property \App\Model\Table\PositionTitlesTable&\Cake\ORM\Association\BelongsTo $PositionTitles
 * @property \App\Model\Table\BuildingsTable&\Cake\ORM\Association\BelongsTo $Buildings
 * @property \App\Model\Table\SupervisorsTable&\Cake\ORM\Association\BelongsTo $Supervisors
 * @property \App\Model\Table\EmployeeFormationsTable&\Cake\ORM\Association\HasMany $EmployeeFormations
 *
 * @method \App\Model\Entity\Employee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Employee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employee|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employee findOrCreate($search, callable $callback = null, $options = [])
 */
class EmployeesTable extends Table
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

        $this->setTable('employees');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Civilities', [
            'foreignKey' => 'civility_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PositionTitles', [
            'foreignKey' => 'position_title_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Buildings', [
            'foreignKey' => 'building_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Supervisors', [
            'foreignKey' => 'supervisor_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('EmployeeFormations', [
            'foreignKey' => 'employee_id'
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
            ->scalar('number')
            ->maxLength('number', 10)
            ->requirePresence('number', 'create')
            ->notEmptyString('number');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 100)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            
            ->allowEmptyString('cellular')
            ->add('cellular', 'isValidUSPhoneFormat', [
                'rule' => 'isValidUSPhoneFormat',
                'provider' => 'table',
            ]);

        

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('more_info')
            ->maxLength('more_info', 255)
            ->allowEmptyString('more_info');


        $validator
            ->date('date_sent_formation_plan')
            ->allowEmptyDate('date_sent_formation_plan');

        $validator
            ->boolean('actif')
            ->allowEmptyString('actif');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['civility_id'], 'Civilities'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));
        $rules->add($rules->existsIn(['position_title_id'], 'PositionTitles'));
        $rules->add($rules->existsIn(['building_id'], 'Buildings'));
        $rules->add($rules->existsIn(['supervisor_id'], 'Supervisors'));

        return $rules;
    }

    public function isValidUSPhoneFormat($check, array $context){
        
        $phone_no=$check;

        $errors = array();
           if(empty($phone_no)) {
               $errors [] = "Please enter Phone Number";
           }
           else if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone_no)) {
               $errors [] = "Please enter valid Phone Number";
           } 
       
           if (!empty($errors))
           return implode("\n", $errors);
       
           return true;
       }
}
