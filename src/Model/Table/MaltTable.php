<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Malt Model
 *
 * @property \App\Model\Table\RecipeTable|\Cake\ORM\Association\BelongsToMany $Recipe
 *
 * @method \App\Model\Entity\Malt get($primaryKey, $options = [])
 * @method \App\Model\Entity\Malt newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Malt[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Malt|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Malt patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Malt[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Malt findOrCreate($search, callable $callback = null, $options = [])
 */
class MaltTable extends Table
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

        $this->setTable('malt');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Recipe', [
            'foreignKey' => 'malt_id',
            'targetForeignKey' => 'recipe_id',
            'joinTable' => 'recipe_malt'
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
            ->scalar('malt_name')
            ->maxLength('malt_name', 255)
            ->requirePresence('malt_name', 'create')
            ->notEmpty('malt_name');

        $validator
            ->scalar('type')
            ->allowEmpty('type');

        $validator
            ->decimal('specific_gravity')
            ->allowEmpty('specific_gravity');

        return $validator;
    }
}
