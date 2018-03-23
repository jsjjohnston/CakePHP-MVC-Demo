<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Yeast Model
 *
 * @property \App\Model\Table\RecipeTable|\Cake\ORM\Association\BelongsToMany $Recipe
 *
 * @method \App\Model\Entity\Yeast get($primaryKey, $options = [])
 * @method \App\Model\Entity\Yeast newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Yeast[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Yeast|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Yeast patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Yeast[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Yeast findOrCreate($search, callable $callback = null, $options = [])
 */
class YeastTable extends Table
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

        $this->setTable('yeast');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Recipe', [
            'foreignKey' => 'yeast_id',
            'targetForeignKey' => 'recipe_id',
            'joinTable' => 'recipe_yeast'
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
            ->scalar('yeast_name')
            ->maxLength('yeast_name', 255)
            ->requirePresence('yeast_name', 'create')
            ->notEmpty('yeast_name');

        $validator
            ->scalar('type')
            ->allowEmpty('type');

        $validator
            ->decimal('attenuation_min')
            ->allowEmpty('attenuation_min');

        $validator
            ->decimal('attenuation_max')
            ->allowEmpty('attenuation_max');

        $validator
            ->decimal('temperature_min')
            ->allowEmpty('temperature_min');

        $validator
            ->decimal('temperature_max')
            ->allowEmpty('temperature_max');

        return $validator;
    }
}
