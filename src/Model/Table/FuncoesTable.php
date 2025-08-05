<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Funcoes Model
 *
 * @property \App\Model\Table\ProjetosTable&\Cake\ORM\Association\BelongsTo $Projetos
 * @property \App\Model\Table\HabilidadesTable&\Cake\ORM\Association\BelongsToMany $Habilidades
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsToMany $Usuarios
 *
 * @method \App\Model\Entity\Funco newEmptyEntity()
 * @method \App\Model\Entity\Funco newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Funco> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Funco get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Funco findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Funco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Funco> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Funco|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Funco saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Funco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Funco>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Funco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Funco> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Funco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Funco>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Funco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Funco> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FuncoesTable extends Table
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

        $this->setTable('funcoes');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Projetos', [
            'foreignKey' => 'projetos_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Habilidades', [
            'foreignKey' => 'funcoes_id',
            'targetForeignKey' => 'habilidade_id',
            'joinTable' => 'funcoes_habilidades',
        ]);
        $this->belongsToMany('Usuarios', [
            'foreignKey' => 'funcoes_id',
            'targetForeignKey' => 'usuario_id',
            'joinTable' => 'usuarios_funcoes',
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

        $validator
            ->integer('quantidade')
            ->requirePresence('quantidade', 'create')
            ->notEmptyString('quantidade');

        $validator
            ->integer('projetos_id')
            ->notEmptyString('projetos_id');

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
        $rules->add($rules->existsIn(['projetos_id'], 'Projetos'), ['errorField' => 'projetos_id']);

        return $rules;
    }
}
