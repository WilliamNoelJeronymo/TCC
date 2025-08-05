<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FuncoesHabilidades Model
 *
 * @property \App\Model\Table\FuncoesTable&\Cake\ORM\Association\BelongsTo $Funcoes
 * @property \App\Model\Table\HabilidadesTable&\Cake\ORM\Association\BelongsTo $Habilidades
 *
 * @method \App\Model\Entity\FuncoesHabilidade newEmptyEntity()
 * @method \App\Model\Entity\FuncoesHabilidade newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\FuncoesHabilidade> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FuncoesHabilidade get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\FuncoesHabilidade findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\FuncoesHabilidade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\FuncoesHabilidade> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FuncoesHabilidade|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\FuncoesHabilidade saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\FuncoesHabilidade>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FuncoesHabilidade>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FuncoesHabilidade>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FuncoesHabilidade> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FuncoesHabilidade>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FuncoesHabilidade>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FuncoesHabilidade>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FuncoesHabilidade> deleteManyOrFail(iterable $entities, array $options = [])
 */
class FuncoesHabilidadesTable extends Table
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

        $this->setTable('funcoes_habilidades');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Funcoes', [
            'foreignKey' => 'funcoes_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Habilidades', [
            'foreignKey' => 'habilidade_id',
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
            ->integer('funcoes_id')
            ->notEmptyString('funcoes_id');

        $validator
            ->integer('habilidade_id')
            ->notEmptyString('habilidade_id');

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
        $rules->add($rules->existsIn(['habilidade_id'], 'Habilidades'), ['errorField' => 'habilidade_id']);

        return $rules;
    }
}
