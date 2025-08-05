<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjetosCategorias Model
 *
 * @property \App\Model\Table\ProjetosTable&\Cake\ORM\Association\BelongsTo $Projetos
 * @property \App\Model\Table\CategoriasTable&\Cake\ORM\Association\BelongsTo $Categorias
 *
 * @method \App\Model\Entity\ProjetosCategoria newEmptyEntity()
 * @method \App\Model\Entity\ProjetosCategoria newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ProjetosCategoria> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjetosCategoria get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ProjetosCategoria findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ProjetosCategoria patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ProjetosCategoria> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjetosCategoria|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ProjetosCategoria saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ProjetosCategoria>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjetosCategoria>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProjetosCategoria>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjetosCategoria> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProjetosCategoria>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjetosCategoria>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProjetosCategoria>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjetosCategoria> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProjetosCategoriasTable extends Table
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

        $this->setTable('projetos_categorias');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projetos', [
            'foreignKey' => 'projeto_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Categorias', [
            'foreignKey' => 'categoria_id',
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
            ->integer('projeto_id')
            ->notEmptyString('projeto_id');

        $validator
            ->integer('categoria_id')
            ->notEmptyString('categoria_id');

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
        $rules->add($rules->existsIn(['categoria_id'], 'Categorias'), ['errorField' => 'categoria_id']);

        return $rules;
    }
}
