<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Combine Entity
 *
 * @property int $id
 * @property int|null $refUser
 * @property int|null $nbEcuParier
 * @property int|null $nbEcuGagner
 * @property bool|null $cloture
 */
class Combine extends Entity
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
        'refUser' => true,
        'nbEcuParier' => true,
        'nbEcuGagner' => true,
        'cloture' => true,
    ];
}
