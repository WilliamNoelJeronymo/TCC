<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Notificacoes Model
 *
 * @property \App\Model\Table\FuncoesTable&\Cake\ORM\Association\BelongsTo $Funcoes
 *
 * @method \App\Model\Entity\Notificaco newEmptyEntity()
 * @method \App\Model\Entity\Notificaco newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Notificaco> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Notificaco get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Notificaco findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Notificaco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Notificaco> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Notificaco|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Notificaco saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Notificaco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Notificaco>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Notificaco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Notificaco> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Notificaco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Notificaco>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Notificaco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Notificaco> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NotificacoesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('notificacoes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Funcoes', [
            'foreignKey' => 'funcoes_id',
            'joinType' => 'INNER',
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
            ->integer('usuario_id_emissor')
            ->requirePresence('usuario_id_emissor', 'create')
            ->notEmptyString('usuario_id_emissor');

        $validator
            ->integer('usuario_id_remetente')
            ->requirePresence('usuario_id_remetente', 'create')
            ->notEmptyString('usuario_id_remetente');

        $validator
            ->integer('funcoes_id')
            ->notEmptyString('funcoes_id');

        $validator
            ->integer('aceite')
            ->notEmptyString('aceite');

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
        $rules->add($rules->existsIn(['funcoes_id'], 'Funcoes'), ['errorField' => 'funcoes_id']);

        return $rules;
    }
}
