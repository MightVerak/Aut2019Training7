<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FormationStatuses Model
 *
 * @property \App\Model\Table\FormationsPositionTitlesTable&\Cake\ORM\Association\HasMany $FormationsPositionTitles
 *
 * @method \App\Model\Entity\FormationStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\FormationStatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FormationStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FormationStatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FormationStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FormationStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FormationStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FormationStatus findOrCreate($search, callable $callback = null, $options = [])
 */
class FormationStatusesTable extends Table
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

        $this->setTable('formation_statuses');
        $this->setDisplayField('formation_status');
        $this->setPrimaryKey('id');

        $this->hasMany('FormationsPositionTitles', [
            'foreignKey' => 'formation_status_id'
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
            ->scalar('formation_status')
            ->maxLength('formation_status', 255)
            ->requirePresence('formation_status', 'create')
            ->notEmptyString('formation_status');

        return $validator;
    }
}
