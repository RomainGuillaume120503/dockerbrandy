<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pariscombine Model
 *
 * @method \App\Model\Entity\Pariscombine newEmptyEntity()
 * @method \App\Model\Entity\Pariscombine newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Pariscombine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pariscombine get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pariscombine findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Pariscombine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pariscombine[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pariscombine|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pariscombine saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pariscombine[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pariscombine[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pariscombine[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pariscombine[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PariscombineTable extends Table
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

        $this->setTable('pariscombine');
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
            ->integer('refCombine')
            ->allowEmptyString('refCombine');

        $validator
            ->integer('refParis')
            ->allowEmptyString('refParis');

        $validator
            ->time('heureParie')
            ->allowEmptyTime('heureParie');

        return $validator;
    }
}
