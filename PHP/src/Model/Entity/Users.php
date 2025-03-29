<?php
declare(strict_types=1);

namespace App\Model\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Users Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $ecu
 *
 * @property \App\Model\Entity\Parieur[] $parieurs
 */
class Users extends Entity
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
    protected $_accessible = [
        'id'=>true,
        'username' => true,
        'password' => true,
        'ecu' => true,
        'parieurs' => true,
		'api'=> true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password):?string{
        if(strlen($password)>=4){
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($password);
        }
        return null;
    }
}

