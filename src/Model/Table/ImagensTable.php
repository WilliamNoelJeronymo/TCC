<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Imagens Model
 *
 * @property \App\Model\Table\ProjetosTable&\Cake\ORM\Association\BelongsTo $Projetos
 *
 * @method \App\Model\Entity\Imagen newEmptyEntity()
 * @method \App\Model\Entity\Imagen newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Imagen> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Imagen get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Imagen findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Imagen patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Imagen> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Imagen|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Imagen saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Imagen>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Imagen>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Imagen>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Imagen> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Imagen>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Imagen>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Imagen>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Imagen> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ImagensTable extends Table
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

        $this->setTable('imagens');
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
