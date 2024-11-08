<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TokenEndpointAuthMethods Model
 *
 * @property \App\Model\Table\RpsTable&\Cake\ORM\Association\BelongsToMany $Rps
 *
 * @method \App\Model\Entity\TokenEndpointAuthMethod newEmptyEntity()
 * @method \App\Model\Entity\TokenEndpointAuthMethod newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\TokenEndpointAuthMethod> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TokenEndpointAuthMethod get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\TokenEndpointAuthMethod findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\TokenEndpointAuthMethod patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\TokenEndpointAuthMethod> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TokenEndpointAuthMethod|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\TokenEndpointAuthMethod saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\TokenEndpointAuthMethod>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TokenEndpointAuthMethod>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TokenEndpointAuthMethod>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TokenEndpointAuthMethod> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TokenEndpointAuthMethod>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TokenEndpointAuthMethod>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TokenEndpointAuthMethod>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TokenEndpointAuthMethod> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TokenEndpointAuthMethodsTable extends Table
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

        $this->setTable('token_endpoint_auth_methods');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Rps', [
            'foreignKey' => 'token_endpoint_auth_method_id',
            'targetForeignKey' => 'rp_id',
            'joinTable' => 'rps_token_endpoint_auth_methods',
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
            ->scalar('token_endpoint_auth_method')
            ->maxLength('token_endpoint_auth_method', 30)
            ->requirePresence('token_endpoint_auth_method', 'create')
            ->notEmptyString('token_endpoint_auth_method');

        return $validator;
    }
}
