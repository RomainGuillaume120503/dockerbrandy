<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Parieurtextuelle Model
 *
 * @method \App\Model\Entity\Parieurtextuelle newEmptyEntity()
 * @method \App\Model\Entity\Parieurtextuelle newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Parieurtextuelle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Parieurtextuelle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Parieurtextuelle findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Parieurtextuelle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Parieurtextuelle[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Parieurtextuelle|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Parieurtextuelle saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Parieurtextuelle[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Parieurtextuelle[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Parieurtextuelle[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Parieurtextuelle[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ParieurtextuelleTable extends Table
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

        $this->setTable('parieurtextuelle');
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
            ->integer('refParisText')
            ->allowEmptyString('refParisText');

        $validator
            ->integer('refUsers')
            ->allowEmptyString('refUsers');

        $validator
            ->boolean('choix')
            ->allowEmptyString('choix');

        return $validator;
    }
}
