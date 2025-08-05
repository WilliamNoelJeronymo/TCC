<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FuncoesRequisitosUsuarios Model
 *
 * @property \App\Model\Table\FuncoesTable&\Cake\ORM\Association\BelongsTo $Funcoes
 * @property \App\Model\Table\RequisitosTable&\Cake\ORM\Association\BelongsTo $Requisitos
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsTo $Usuarios
 *
 * @method \App\Model\Entity\FuncoesRequisitosUsuario newEmptyEntity()
 * @method \App\Model\Entity\FuncoesRequisitosUsuario newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\FuncoesRequisitosUsuario> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FuncoesRequisitosUsuario get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\FuncoesRequisitosUsuario findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\FuncoesRequisitosUsuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\FuncoesRequisitosUsuario> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FuncoesRequisitosUsuario|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\FuncoesRequisitosUsuario saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\FuncoesRequisitosUsuario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FuncoesRequisitosUsuario>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FuncoesRequisitosUsuario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FuncoesRequisitosUsuario> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FuncoesRequisitosUsuario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FuncoesRequisitosUsuario>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FuncoesRequisitosUsuario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FuncoesRequisitosUsuario> deleteManyOrFail(iterable $entities, array $options = [])
 */
class FuncoesRequisitosUsuariosTable extends Table
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

        $this->setTable('funcoes_requisitos_usuarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Funcoes', [
            'foreignKey' => 'funcoe_id',
        ]);
        $this->belongsTo('Requisitos', [
            'foreignKey' => 'requisito_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuarios_id',
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
            ->integer('funcoe_id')
            ->allowEmptyString('funcoe_id');

        $validator
            ->integer('requisito_id')
            ->notEmptyString('requisito_id');

        $validator
            ->integer('usuarios_id')
            ->allowEmptyString('usuarios_id');

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
        $rules->add($rules->existsIn(['funcoe_id'], 'Funcoes'), ['errorField' => 'funcoe_id']);
        $rules->add($rules->existsIn(['requisito_id'], 'Requisitos'), ['errorField' => 'requisito_id']);
        $rules->add($rules->existsIn(['usuarios_id'], 'Usuarios'), ['errorField' => 'usuarios_id']);

        return $rules;
    }
}
