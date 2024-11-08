<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Resource Entity
 *
 * @property int $id
 * @property int $resourceserver_id
 * @property string|null $resource
 *
 * @property \App\Model\Entity\Resourceserver $resourceserver
 * @property \App\Model\Entity\Rp[] $rps
 */
class Resource extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'resourceserver_id' => true,
        'resource' => true,
        'resourceserver' => true,
        'rps' => true,
    ];
}
