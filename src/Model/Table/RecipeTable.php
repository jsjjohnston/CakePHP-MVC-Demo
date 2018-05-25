<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recipe Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\HopsTable|\Cake\ORM\Association\BelongsToMany $Hops
 * @property \App\Model\Table\MaltTable|\Cake\ORM\Association\BelongsToMany $Malt
 * @property \App\Model\Table\StyleTable|\Cake\ORM\Association\BelongsToMany $Style
 * @property \App\Model\Table\YeastTable|\Cake\ORM\Association\BelongsToMany $Yeast
 *
 * @method \App\Model\Entity\Recipe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Recipe newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Recipe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Recipe|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Recipe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Recipe[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Recipe findOrCreate($search, callable $callback = null, $options = [])
 */
class RecipeTable extends Table
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

        $this->setTable('recipe');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Hops', [
            'foreignKey' => 'recipe_id',
            'targetForeignKey' => 'hop_id',
            'joinTable' => 'recipe_hops'
        ]);

        //$this->hasMany('Hops', [
        //    'foreignKey' => 'recipe_id'
        //]);

        //$this->hasMany('Malt', [
        //    'foreignKey' => 'recipe_id'
        //]);

        $this->belongsToMany('Malt', [
            'foreignKey' => 'recipe_id',
            'targetForeignKey' => 'malt_id',
            'joinTable' => 'recipe_malt'
        ]);
        $this->belongsToMany('Style', [
            'foreignKey' => 'recipe_id',
            'targetForeignKey' => 'style_id',
            'joinTable' => 'recipe_style'
        ]);
        $this->belongsToMany('Yeast', [
            'foreignKey' => 'recipe_id',
            'targetForeignKey' => 'yeast_id',
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
            ->scalar('recipe_name')
            ->maxLength('recipe_name', 255)
            ->requirePresence('recipe_name', 'create')
            ->notEmpty('recipe_name');

        $validator
            ->decimal('batch_size')
            ->allowEmpty('batch_size');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    public function isOwnedBy($recipeId, $userId)
{
    return $this->exists(['id' => $recipeId, 'user_id' => $userId]);
}
}
