<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Profs Model
 *
 * @method \App\Model\Entity\Profs newEmptyEntity()
 * @method \App\Model\Entity\Profs newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Profs[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Profs get($primaryKey, $options = [])
 * @method \App\Model\Entity\Profs findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Profs patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Profs[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Profs|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Profs saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Profs[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Profs[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Profs[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Profs[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProfsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('profs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->numeric('multiplicateur')
            ->requirePresence('multiplicateur', 'create')
            ->notEmptyString('multiplicateur');

        return $validator;
    }
}
