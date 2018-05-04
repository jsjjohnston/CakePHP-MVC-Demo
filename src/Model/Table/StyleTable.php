<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Style Model
 *
 * @property \App\Model\Table\RecipeTable|\Cake\ORM\Association\BelongsToMany $Recipe
 *
 * @method \App\Model\Entity\Style get($primaryKey, $options = [])
 * @method \App\Model\Entity\Style newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Style[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Style|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Style patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Style[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Style findOrCreate($search, callable $callback = null, $options = [])
 */
class StyleTable extends Table
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

        $this->setTable('style');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Recipe', [
            'foreignKey' => 'style_id',
            'targetForeignKey' => 'recipe_id',
            'joinTable' => 'recipe_style'
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
            ->scalar('style_name')
            ->maxLength('style_name', 255)
            ->requirePresence('style_name', 'create')
            ->notEmpty('style_name');

        $validator
            ->scalar('type')
            ->allowEmpty('type');

        return $validator;
    }
}
