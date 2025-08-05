<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requisitos Model
 *
 * @property \App\Model\Table\FuncoesRequisitosUsuariosTable&\Cake\ORM\Association\HasMany $FuncoesRequisitosUsuarios
 *
 * @method \App\Model\Entity\Requisito newEmptyEntity()
 * @method \App\Model\Entity\Requisito newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Requisito> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Requisito get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Requisito findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Requisito patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Requisito> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Requisito|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Requisito saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Requisito>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Requisito>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Requisito>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Requisito> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Requisito>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Requisito>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Requisito>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Requisito> deleteManyOrFail(iterable $entities, array $options = [])
 */
class RequisitosTable extends Table
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

        $this->setTable('requisitos');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->hasMany('FuncoesRequisitosUsuarios', [
            'foreignKey' => 'requisito_id',
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
            ->scalar('descricao')
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        return $validator;
    }
}
