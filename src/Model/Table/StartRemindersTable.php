<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StartReminders Model
 *
 * @property \App\Model\Table\FormationsTable&\Cake\ORM\Association\HasMany $Formations
 *
 * @method \App\Model\Entity\StartReminder get($primaryKey, $options = [])
 * @method \App\Model\Entity\StartReminder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StartReminder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StartReminder|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StartReminder saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StartReminder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StartReminder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StartReminder findOrCreate($search, callable $callback = null, $options = [])
 */
class StartRemindersTable extends Table
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

        $this->setTable('start_reminders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Formations', [
            'foreignKey' => 'start_reminder_id'
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
            ->scalar('start_reminder')
            ->maxLength('start_reminder', 255)
            ->requirePresence('start_reminder', 'create')
            ->notEmptyString('start_reminder');

        return $validator;
    }
}
