<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Resources Model
 *
 * @property \App\Model\Table\ResourceserversTable&\Cake\ORM\Association\BelongsTo $Resourceservers
 * @property \App\Model\Table\RpsTable&\Cake\ORM\Association\BelongsToMany $Rps
 *
 * @method \App\Model\Entity\Resource newEmptyEntity()
 * @method \App\Model\Entity\Resource newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Resource> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Resource get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Resource findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Resource patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Resource> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Resource|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Resource saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Resource>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Resource>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Resource>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Resource> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Resource>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Resource>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Resource>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Resource> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ResourcesTable extends Table
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

        $this->setTable('resources');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Resourceservers', [
            'foreignKey' => 'resourceserver_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Rps', [
            'foreignKey' => 'resource_id',
            'targetForeignKey' => 'rp_id',
            'joinTable' => 'resources_rps',
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
            ->integer('resourceserver_id')
            ->notEmptyString('resourceserver_id');

        $validator
            ->scalar('resource')
            ->maxLength('resource', 255)
            ->allowEmptyString('resource');

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
        $rules->add($rules->existsIn('resourceserver_id', 'Resourceservers'), ['errorField' => 'resourceserver_id']);

        return $rules;
    }
}
