<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Habilidades Model
 *
 * @property \App\Model\Table\FuncoesTable&\Cake\ORM\Association\BelongsToMany $Funcoes
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsToMany $Usuarios
 *
 * @method \App\Model\Entity\Habilidade newEmptyEntity()
 * @method \App\Model\Entity\Habilidade newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Habilidade> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Habilidade get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Habilidade findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Habilidade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Habilidade> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Habilidade|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Habilidade saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Habilidade>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Habilidade>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Habilidade>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Habilidade> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Habilidade>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Habilidade>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Habilidade>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Habilidade> deleteManyOrFail(iterable $entities, array $options = [])
 */
class HabilidadesTable extends Table
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

        $this->setTable('habilidades');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Funcoes', [
            'foreignKey' => 'habilidade_id',
            'targetForeignKey' => 'funcoes_id',
            'joinTable' => 'funcoes_habilidades',
        ]);
        $this->belongsToMany('Usuarios', [
            'foreignKey' => 'habilidade_id',
            'targetForeignKey' => 'usuario_id',
            'joinTable' => 'usuarios_habilidades',
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

        return $validator;
    }
}
