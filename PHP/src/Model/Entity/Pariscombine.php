<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pariscombine Entity
 *
 * @property int $id
 * @property int|null $refCombine
 * @property int|null $refParis
 * @property \Cake\I18n\Time|null $heureParie
 */
class Pariscombine extends Entity
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
        'refCombine' => true,
        'refParis' => true,
        'heureParie' => true,
    ];
}
