<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AllowedAuthMethods Model
 *
 * @property \App\Model\Table\RpsTable&\Cake\ORM\Association\BelongsToMany $Rps
 *
 * @method \App\Model\Entity\AllowedAuthMethod newEmptyEntity()
 * @method \App\Model\Entity\AllowedAuthMethod newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\AllowedAuthMethod> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AllowedAuthMethod get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\AllowedAuthMethod findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\AllowedAuthMethod patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\AllowedAuthMethod> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AllowedAuthMethod|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\AllowedAuthMethod saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\AllowedAuthMethod>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AllowedAuthMethod>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AllowedAuthMethod>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AllowedAuthMethod> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AllowedAuthMethod>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AllowedAuthMethod>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AllowedAuthMethod>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AllowedAuthMethod> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AllowedAuthMethodsTable extends Table
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

        $this->setTable('allowed_auth_methods');
        $this->setDisplayField('auth_method');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Rps', [
            'foreignKey' => 'allowed_auth_method_id',
            'targetForeignKey' => 'rp_id',
            'joinTable' => 'rps_allowed_auth_methods',
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
            ->scalar('auth_method')
            ->maxLength('auth_method', 30)
            ->requirePresence('auth_method', 'create')
            ->notEmptyString('auth_method');

        return $validator;
    }
}
