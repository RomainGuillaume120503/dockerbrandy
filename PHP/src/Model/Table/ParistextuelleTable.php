<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Paristextuelle Model
 *
 * @method \App\Model\Entity\Paristextuelle newEmptyEntity()
 * @method \App\Model\Entity\Paristextuelle newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Paristextuelle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Paristextuelle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Paristextuelle findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Paristextuelle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Paristextuelle[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Paristextuelle|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paristextuelle saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paristextuelle[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paristextuelle[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paristextuelle[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paristextuelle[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ParistextuelleTable extends Table
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

        $this->setTable('paristextuelle');
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
            ->scalar('texte')
            ->maxLength('texte', 244)
            ->allowEmptyString('texte');

        $validator
            ->boolean('estValide')
            ->allowEmptyString('estValide');

        $validator
            ->integer('idCreateur')
            ->allowEmptyString('idCreateur');

        return $validator;
    }
}
