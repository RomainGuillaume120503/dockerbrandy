<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transfert Model
 *
 * @method \App\Model\Entity\Transfert newEmptyEntity()
 * @method \App\Model\Entity\Transfert newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Transfert[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transfert get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transfert findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Transfert patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transfert[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transfert|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transfert saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transfert[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Transfert[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Transfert[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Transfert[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TransfertTable extends Table
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

        $this->setTable('transfert');
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
            ->integer('user_donneur')
            ->allowEmptyString('user_donneur');

        $validator
            ->integer('user_receveur')
            ->allowEmptyString('user_receveur');

        $validator
            ->allowEmptyString('montant');

        return $validator;
    }
}
