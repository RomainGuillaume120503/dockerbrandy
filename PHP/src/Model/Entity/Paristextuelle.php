<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Paristextuelle Entity
 *
 * @property int $id
 * @property string|null $texte
 * @property int|null $estValide
 * @property int|null $idCreateur
 */
class Paristextuelle extends Entity
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
        'texte' => true,
        'estValide' => true,
        'idCreateur' => true,
    ];
}
