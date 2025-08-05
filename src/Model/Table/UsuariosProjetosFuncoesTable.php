<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsuariosProjetosFuncoes Model
 *
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsTo $Usuarios
 * @property \App\Model\Table\FuncoesTable&\Cake\ORM\Association\BelongsTo $Funcoes
 * @property \App\Model\Table\ProjetosTable&\Cake\ORM\Association\BelongsTo $Projetos
 *
 * @method \App\Model\Entity\UsuariosProjetosFunco newEmptyEntity()
 * @method \App\Model\Entity\UsuariosProjetosFunco newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\UsuariosProjetosFunco> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsuariosProjetosFunco get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\UsuariosProjetosFunco findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\UsuariosProjetosFunco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\UsuariosProjetosFunco> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsuariosProjetosFunco|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\UsuariosProjetosFunco saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\UsuariosProjetosFunco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsuariosProjetosFunco>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UsuariosProjetosFunco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsuariosProjetosFunco> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UsuariosProjetosFunco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsuariosProjetosFunco>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UsuariosProjetosFunco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsuariosProjetosFunco> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UsuariosProjetosFuncoesTable extends Table
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

        $this->setTable('usuarios_projetos_funcoes');
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
            ->integer('usuario_id')
            ->notEmptyString('usuario_id');

        $validator
            ->integer('funcoes_id')
            ->notEmptyString('funcoes_id');

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
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'), ['errorField' => 'usuario_id']);
        $rules->add($rules->existsIn(['funcoes_id'], 'Funcoes'), ['errorField' => 'funcoes_id']);
        $rules->add($rules->existsIn(['projeto_id'], 'Projetos'), ['errorField' => 'projeto_id']);

        return $rules;
    }
}
