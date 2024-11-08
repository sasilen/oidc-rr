<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Scopes Model
 *
 * @property \App\Model\Table\RpsTable&\Cake\ORM\Association\BelongsToMany $Rps
 *
 * @method \App\Model\Entity\Scope newEmptyEntity()
 * @method \App\Model\Entity\Scope newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Scope> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Scope get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Scope findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Scope patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Scope> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Scope|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Scope saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Scope>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Scope>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Scope>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Scope> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Scope>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Scope>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Scope>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Scope> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ScopesTable extends Table
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

        $this->setTable('scopes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Rps', [
            'foreignKey' => 'scope_id',
            'targetForeignKey' => 'rp_id',
            'joinTable' => 'rps_scopes',
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
            ->scalar('scope')
            ->maxLength('scope', 255)
            ->allowEmptyString('scope');

        return $validator;
    }
}
