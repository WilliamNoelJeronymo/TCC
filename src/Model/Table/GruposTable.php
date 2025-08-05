<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Grupos Model
 *
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\HasMany $Usuarios
 *
 * @method \App\Model\Entity\Grupo newEmptyEntity()
 * @method \App\Model\Entity\Grupo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Grupo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Grupo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Grupo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Grupo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Grupo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Grupo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Grupo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Grupo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Grupo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Grupo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Grupo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Grupo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Grupo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Grupo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Grupo> deleteManyOrFail(iterable $entities, array $options = [])
 */
class GruposTable extends Table
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

        $this->setTable('grupos');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->hasMany('Usuarios', [
            'foreignKey' => 'grupo_id',
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
