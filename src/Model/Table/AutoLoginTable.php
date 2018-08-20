<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AutoLogin Model
 *
 * @method \App\Model\Entity\AutoLogin get($primaryKey, $options = [])
 * @method \App\Model\Entity\AutoLogin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AutoLogin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AutoLogin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AutoLogin|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AutoLogin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AutoLogin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AutoLogin findOrCreate($search, callable $callback = null, $options = [])
 */
class AutoLoginTable extends Table
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

        $this->setTable('auto_login');
        $this->setDisplayField('user_id');
        $this->setPrimaryKey('user_id');
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
            ->integer('user_id')
            ->allowEmpty('user_id', 'create');

        $validator
            ->scalar('auto_login_key')
            ->maxLength('auto_login_key', 255)
            ->requirePresence('auto_login_key', 'create')
            ->notEmpty('auto_login_key');

        return $validator;
    }
}
