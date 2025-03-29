<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Parieurs Entity
 *
 * @property int $id
 * @property int|null $paris_id
 * @property int|null $user_id
 * @property int $nbEcuParier
 * @property int|null $nbEcuGagne
 * @property \Cake\I18n\Time $heure_estimee
 *
 * @property \App\Model\Entity\Paris $paris
 * @property \App\Model\Entity\Users $users
 */
class Parieurs extends Entity
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
        'paris_id' => true,
        'user_id' => true,
        'nbEcuParier' => true,
        'nbEcuGagne' => true,
        'heure_estimee' => true,
        'paris' => true,
        'users' => true,
    ];
}
