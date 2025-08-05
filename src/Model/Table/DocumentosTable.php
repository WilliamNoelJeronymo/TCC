<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Documentos Model
 *
 * @property \App\Model\Table\ProjetosTable&\Cake\ORM\Association\BelongsTo $Projetos
 *
 * @method \App\Model\Entity\Documento newEmptyEntity()
 * @method \App\Model\Entity\Documento newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Documento> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Documento get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Documento findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Documento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Documento> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Documento|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Documento saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Documento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Documento>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Documento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Documento> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Documento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Documento>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Documento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Documento> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DocumentosTable extends Table
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

        $this->setTable('documentos');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projetos', [
            'foreignKey' => 'projeto_id',
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
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->integer('projeto_id')
            ->notEmptyString('projeto_id');

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
        $rules->add($rules->existsIn(['projeto_id'], 'Projetos'), ['errorField' => 'projeto_id']);

        return $rules;
    }
}
