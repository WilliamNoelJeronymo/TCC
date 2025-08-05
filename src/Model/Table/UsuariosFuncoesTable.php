<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsuariosFuncoes Model
 *
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsTo $Usuarios
 * @property \App\Model\Table\FuncoesTable&\Cake\ORM\Association\BelongsTo $Funcoes
 *
 * @method \App\Model\Entity\UsuariosFunco newEmptyEntity()
 * @method \App\Model\Entity\UsuariosFunco newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\UsuariosFunco> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsuariosFunco get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\UsuariosFunco findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\UsuariosFunco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\UsuariosFunco> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsuariosFunco|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\UsuariosFunco saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\UsuariosFunco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsuariosFunco>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UsuariosFunco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsuariosFunco> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UsuariosFunco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsuariosFunco>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UsuariosFunco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsuariosFunco> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UsuariosFuncoesTable extends Table
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

        $this->setTable('usuarios_funcoes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
            'joinType' => 'INNER',
        ]);
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
            ->integer('usuario_id')
            ->notEmptyString('usuario_id');

        $validator
            ->integer('funcoes_id')
            ->notEmptyString('funcoes_id');

        $validator
            ->boolean('editor')
            ->notEmptyString('editor');

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
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'), ['errorField' => 'usuario_id']);
        $rules->add($rules->existsIn(['funcoes_id'], 'Funcoes'), ['errorField' => 'funcoes_id']);

        return $rules;
    }
}
