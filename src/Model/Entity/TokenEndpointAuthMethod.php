<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TokenEndpointAuthMethod Entity
 *
 * @property int $id
 * @property string $token_endpoint_auth_method
 *
 * @property \App\Model\Entity\Rp[] $rps
 */
class TokenEndpointAuthMethod extends Entity
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
        'token_endpoint_auth_method' => true,
        'rps' => true,
    ];
}
