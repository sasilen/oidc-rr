<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GrantTypes Model
 *
 * @property \App\Model\Table\RpsTable&\Cake\ORM\Association\BelongsToMany $Rps
 *
 * @method \App\Model\Entity\GrantType newEmptyEntity()
 * @method \App\Model\Entity\GrantType newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\GrantType> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GrantType get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\GrantType findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\GrantType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\GrantType> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\GrantType|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\GrantType saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\GrantType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\GrantType>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\GrantType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\GrantType> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\GrantType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\GrantType>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\GrantType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\GrantType> deleteManyOrFail(iterable $entities, array $options = [])
 */
class GrantTypesTable extends Table
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

        $this->setTable('grant_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Rps', [
            'foreignKey' => 'grant_type_id',
            'targetForeignKey' => 'rp_id',
            'joinTable' => 'rps_grant_types',
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
            ->scalar('grant_type')
            ->maxLength('grant_type', 255)
            ->allowEmptyString('grant_type');

        return $validator;
    }
}
