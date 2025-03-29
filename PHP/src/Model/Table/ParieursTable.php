<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Parieurs Model
 *
 * @property \App\Model\Table\ParisTable&\Cake\ORM\Association\BelongsTo $Paris
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Parieurs newEmptyEntity()
 * @method \App\Model\Entity\Parieurs newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Parieurs[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Parieurs get($primaryKey, $options = [])
 * @method \App\Model\Entity\Parieurs findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Parieurs patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Parieurs[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Parieurs|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Parieurs saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Parieurs[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Parieurs[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Parieurs[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Parieurs[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ParieursTable extends Table
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

        $this->setTable('parieurs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Paris', [
            'foreignKey' => 'paris_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
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
            ->integer('paris_id')
            ->allowEmptyString('paris_id');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->integer('nbEcuParier')
            ->requirePresence('nbEcuParier', 'create')
            ->notEmptyString('nbEcuParier');

        $validator
            ->integer('nbEcuGagne')
            ->allowEmptyString('nbEcuGagne');

        $validator
            ->time('heure_estimee')
            ->requirePresence('heure_estimee', 'create')
            ->notEmptyTime('heure_estimee');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('paris_id', 'Paris'), ['errorField' => 'paris_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
