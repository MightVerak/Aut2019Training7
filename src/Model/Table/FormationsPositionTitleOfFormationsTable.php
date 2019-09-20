<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FormationsPositionTitleOfFormations Model
 *
 * @property \App\Model\Table\FormationsTable&\Cake\ORM\Association\BelongsTo $Formations
 * @property \App\Model\Table\PositionTitleOfFormationsTable&\Cake\ORM\Association\BelongsTo $PositionTitleOfFormations
 *
 * @method \App\Model\Entity\FormationsPositionTitleOfFormation get($primaryKey, $options = [])
 * @method \App\Model\Entity\FormationsPositionTitleOfFormation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FormationsPositionTitleOfFormation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FormationsPositionTitleOfFormation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FormationsPositionTitleOfFormation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FormationsPositionTitleOfFormation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FormationsPositionTitleOfFormation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FormationsPositionTitleOfFormation findOrCreate($search, callable $callback = null, $options = [])
 */
class FormationsPositionTitleOfFormationsTable extends Table
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

        $this->setTable('formations_position_title_of_formations');

        $this->belongsTo('Formations', [
            'foreignKey' => 'formation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PositionTitleOfFormations', [
            'foreignKey' => 'position_title_of_formations_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['formation_id'], 'Formations'));
        $rules->add($rules->existsIn(['position_title_of_formations_id'], 'PositionTitleOfFormations'));

        return $rules;
    }
}
