<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hops Model
 *
 * @property \App\Model\Table\RecipeTable|\Cake\ORM\Association\BelongsToMany $Recipe
 *
 * @method \App\Model\Entity\Hop get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hop newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Hop[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hop|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hop patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hop[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hop findOrCreate($search, callable $callback = null, $options = [])
 */
class HopsTable extends Table
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

        $this->setTable('hops');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Recipe', [
            'foreignKey' => 'hop_id',
            'targetForeignKey' => 'recipe_id',
            'joinTable' => 'recipe_hops'
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('hop_name')
            ->maxLength('hop_name', 255)
            ->requirePresence('hop_name', 'create')
            ->notEmpty('hop_name');

        $validator
            ->scalar('type')
            ->allowEmpty('type');

        $validator
            ->decimal('alpha_acid')
            ->allowEmpty('alpha_acid');

        return $validator;
    }
}
