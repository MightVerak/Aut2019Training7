<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Formations Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\FrequencesTable&\Cake\ORM\Association\BelongsTo $Frequences
 * @property \App\Model\Table\StartRemindersTable&\Cake\ORM\Association\BelongsTo $StartReminders
 * @property \App\Model\Table\ModalitiesTable&\Cake\ORM\Association\BelongsTo $Modalities
 * @property \App\Model\Table\EmployeeFormationsTable&\Cake\ORM\Association\HasMany $EmployeeFormations
 * @property \App\Model\Table\PositionTitlesTable&\Cake\ORM\Association\BelongsToMany $PositionTitles
 *
 * @method \App\Model\Entity\Formation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Formation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Formation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Formation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Formation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Formation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Formation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Formation findOrCreate($search, callable $callback = null, $options = [])
 */
class FormationsTable extends Table
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

        $this->setTable('formations');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'categorie_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Frequences', [
            'foreignKey' => 'frequence_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('StartReminders', [
            'foreignKey' => 'start_reminder_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Modalities', [
            'foreignKey' => 'modality_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('EmployeeFormations', [
            'foreignKey' => 'formation_id'
        ]);
        $this->belongsToMany('PositionTitles', [
            'foreignKey' => 'formation_id',
            'targetForeignKey' => 'position_title_id',
            'joinTable' => 'formations_position_titles'
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
            ->maxLength('number', 50)
            ->requirePresence('number', 'create')
            ->notEmptyString('number');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->decimal('duration')
            ->requirePresence('duration', 'create')
            ->notEmptyString('duration');

        $validator
            ->scalar('note')
            ->maxLength('note', 255)
            ->allowEmptyString('note');

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
        $rules->add($rules->existsIn(['categorie_id'], 'Categories'));
        $rules->add($rules->existsIn(['frequence_id'], 'Frequences'));
        $rules->add($rules->existsIn(['start_reminder_id'], 'StartReminders'));
        $rules->add($rules->existsIn(['modality_id'], 'Modalities'));

        return $rules;
    }
}
