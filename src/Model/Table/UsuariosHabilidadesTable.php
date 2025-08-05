<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsuariosHabilidades Model
 *
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsTo $Usuarios
 * @property \App\Model\Table\HabilidadesTable&\Cake\ORM\Association\BelongsTo $Habilidades
 *
 * @method \App\Model\Entity\UsuariosHabilidade newEmptyEntity()
 * @method \App\Model\Entity\UsuariosHabilidade newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\UsuariosHabilidade> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsuariosHabilidade get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\UsuariosHabilidade findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\UsuariosHabilidade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\UsuariosHabilidade> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsuariosHabilidade|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\UsuariosHabilidade saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\UsuariosHabilidade>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsuariosHabilidade>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UsuariosHabilidade>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsuariosHabilidade> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UsuariosHabilidade>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsuariosHabilidade>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UsuariosHabilidade>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsuariosHabilidade> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UsuariosHabilidadesTable extends Table
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

        $this->setTable('usuarios_habilidades');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
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
            ->integer('usuario_id')
            ->notEmptyString('usuario_id');

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
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'), ['errorField' => 'usuario_id']);
        $rules->add($rules->existsIn(['habilidade_id'], 'Habilidades'), ['errorField' => 'habilidade_id']);

        return $rules;
    }
}
