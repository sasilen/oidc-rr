<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ResponseTypes Model
 *
 * @property \App\Model\Table\RpsTable&\Cake\ORM\Association\BelongsToMany $Rps
 *
 * @method \App\Model\Entity\ResponseType newEmptyEntity()
 * @method \App\Model\Entity\ResponseType newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ResponseType> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ResponseType get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ResponseType findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ResponseType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ResponseType> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ResponseType|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ResponseType saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ResponseType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ResponseType>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ResponseType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ResponseType> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ResponseType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ResponseType>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ResponseType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ResponseType> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ResponseTypesTable extends Table
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

        $this->setTable('response_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Rps', [
            'foreignKey' => 'response_type_id',
            'targetForeignKey' => 'rp_id',
            'joinTable' => 'rps_response_types',
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
            ->scalar('response_type')
            ->maxLength('response_type', 255)
            ->allowEmptyString('response_type');

        return $validator;
    }
}
