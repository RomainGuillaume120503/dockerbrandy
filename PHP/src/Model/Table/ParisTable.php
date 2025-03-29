<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Paris Model
 *
 * @property \App\Model\Table\ProfsTable&\Cake\ORM\Association\BelongsTo $Profs
 * @property \App\Model\Table\ParieursTable&\Cake\ORM\Association\HasMany $Parieurs
 *
 * @method \App\Model\Entity\Paris newEmptyEntity()
 * @method \App\Model\Entity\Paris newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Paris[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Paris get($primaryKey, $options = [])
 * @method \App\Model\Entity\Paris findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Paris patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Paris[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Paris|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paris saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paris[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paris[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paris[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paris[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ParisTable extends Table
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

        $this->setTable('paris');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Profs', [
            'foreignKey' => 'prof_id',
        ]);
        $this->hasMany('Parieurs', [
            'foreignKey' => 'paris_id',
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
            ->integer('prof_id')
            ->allowEmptyString('prof_id');

        $validator
            ->time('course_hour')
            ->allowEmptyTime('course_hour');

        $validator
            ->time('arrival_hour')
            ->allowEmptyTime('arrival_hour');

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
        $rules->add($rules->existsIn('prof_id', 'Profs'), ['errorField' => 'prof_id']);

        return $rules;
    }
}
