<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rp Entity
 *
 * @property int $id
 * @property string|null $client_identifier
 * @property string|null $client_secret
 * @property string|null $client_name
 * @property string|null $token_endpoint_auth_method
 * @property string|null $contacts
 * @property string|null $policy_uri
 * @property string|null $initiate_login_uri
 *
 * @property \App\Model\Entity\RedirectUri[] $redirect_uris
 * @property \App\Model\Entity\Resource[] $resources
 * @property \App\Model\Entity\AllowedAuthMethod[] $allowed_auth_methods
 * @property \App\Model\Entity\Federation[] $federations
 * @property \App\Model\Entity\GrantType[] $grant_types
 * @property \App\Model\Entity\ResponseType[] $response_types
 * @property \App\Model\Entity\Scope[] $scopes
 * @property \App\Model\Entity\TokenEndpointAuthMethod[] $token_endpoint_auth_methods
 * @property \App\Model\Entity\User[] $users
 */
class Rp extends Entity
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
        'client_identifier' => true,
        'client_secret' => true,
        'client_name' => true,
        'token_endpoint_auth_method' => true,
        'redirect_uris' => true,
        'contacts' => true,
        'policy_uri' => true,
        'initiate_login_uri' => true,
        'resources' => true,
        'allowed_auth_methods' => true,
        'federations' => true,
        'grant_types' => true,
        'response_types' => true,
        'scopes' => true,
        'token_endpoint_auth_methods' => true,
        'users' => true,
    ];
}
