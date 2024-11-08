<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rps Model
 *
 * @property \App\Model\Table\RedirectUrisTable&\Cake\ORM\Association\HasMany $RedirectUris
 * @property \App\Model\Table\ResourcesTable&\Cake\ORM\Association\BelongsToMany $Resources
 * @property \App\Model\Table\AllowedAuthMethodsTable&\Cake\ORM\Association\BelongsToMany $AllowedAuthMethods
 * @property \App\Model\Table\FederationsTable&\Cake\ORM\Association\BelongsToMany $Federations
 * @property \App\Model\Table\GrantTypesTable&\Cake\ORM\Association\BelongsToMany $GrantTypes
 * @property \App\Model\Table\ResponseTypesTable&\Cake\ORM\Association\BelongsToMany $ResponseTypes
 * @property \App\Model\Table\ScopesTable&\Cake\ORM\Association\BelongsToMany $Scopes
 * @property \App\Model\Table\TokenEndpointAuthMethodsTable&\Cake\ORM\Association\BelongsToMany $TokenEndpointAuthMethods
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Rp newEmptyEntity()
 * @method \App\Model\Entity\Rp newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Rp> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rp get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Rp findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Rp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Rp> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rp|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Rp saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Rp>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Rp>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Rp>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Rp> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Rp>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Rp>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Rp>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Rp> deleteManyOrFail(iterable $entities, array $options = [])
 */
class RpsTable extends Table
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

        $this->setTable('rps');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('RedirectUris', [
            'foreignKey' => 'rp_id',
        ]);
        $this->belongsToMany('Resources', [
            'foreignKey' => 'rp_id',
            'targetForeignKey' => 'resource_id',
            'joinTable' => 'resources_rps',
        ]);
        $this->belongsToMany('AllowedAuthMethods', [
            'foreignKey' => 'rp_id',
            'targetForeignKey' => 'allowed_auth_method_id',
            'joinTable' => 'rps_allowed_auth_methods',
        ]);
        $this->belongsToMany('Federations', [
            'foreignKey' => 'rp_id',
            'targetForeignKey' => 'federation_id',
            'joinTable' => 'rps_federations',
        ]);
        $this->belongsToMany('GrantTypes', [
            'foreignKey' => 'rp_id',
            'targetForeignKey' => 'grant_type_id',
            'joinTable' => 'rps_grant_types',
        ]);
        $this->belongsToMany('ResponseTypes', [
            'foreignKey' => 'rp_id',
            'targetForeignKey' => 'response_type_id',
            'joinTable' => 'rps_response_types',
        ]);
        $this->belongsToMany('Scopes', [
            'foreignKey' => 'rp_id',
            'targetForeignKey' => 'scope_id',
            'joinTable' => 'rps_scopes',
        ]);
        $this->belongsToMany('TokenEndpointAuthMethods', [
            'foreignKey' => 'rp_id',
            'targetForeignKey' => 'token_endpoint_auth_method_id',
            'joinTable' => 'rps_token_endpoint_auth_methods',
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'rp_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'rps_users',
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
            ->scalar('client_identifier')
            ->maxLength('client_identifier', 255)
            ->allowEmptyString('client_identifier');

        $validator
            ->scalar('client_secret')
            ->maxLength('client_secret', 255)
            ->allowEmptyString('client_secret');

        $validator
            ->scalar('client_name')
            ->maxLength('client_name', 255)
            ->allowEmptyString('client_name');

        $validator
            ->scalar('token_endpoint_auth_method')
            ->maxLength('token_endpoint_auth_method', 20)
            ->allowEmptyString('token_endpoint_auth_method');

        $validator
            ->scalar('redirect_uris')
            ->maxLength('redirect_uris', 500)
            ->allowEmptyString('redirect_uris');

        $validator
            ->scalar('contacts')
            ->maxLength('contacts', 500)
            ->allowEmptyString('contacts');

        $validator
            ->scalar('policy_uri')
            ->maxLength('policy_uri', 255)
            ->allowEmptyString('policy_uri');

        $validator
            ->scalar('initiate_login_uri')
            ->maxLength('initiate_login_uri', 255)
            ->allowEmptyString('initiate_login_uri');

        return $validator;
    }
}
