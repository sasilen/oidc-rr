<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Federations Model
 *
 * @property \App\Model\Table\RpsTable&\Cake\ORM\Association\BelongsToMany $Rps
 *
 * @method \App\Model\Entity\Federation newEmptyEntity()
 * @method \App\Model\Entity\Federation newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Federation> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Federation get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Federation findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Federation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Federation> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Federation|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Federation saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Federation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Federation>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Federation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Federation> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Federation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Federation>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Federation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Federation> deleteManyOrFail(iterable $entities, array $options = [])
 */
class FederationsTable extends Table
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

        $this->setTable('federations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Rps', [
            'foreignKey' => 'federation_id',
            'targetForeignKey' => 'rp_id',
            'joinTable' => 'rps_federations',
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->allowEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmptyString('description');

        return $validator;
    }
}
