<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Paris Entity
 *
 * @property int $id
 * @property int|null $prof_id
 * @property \Cake\I18n\Time|null $course_hour
 * @property \Cake\I18n\Time|null $arrival_hour
 *
 * @property \App\Model\Entity\Profs $profs
 * @property \App\Model\Entity\Parieurs[] $parieurs
 */
class Paris extends Entity
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
        'prof_id' => true,
        'course_hour' => true,
        'arrival_hour' => true,
        'profs' => true,
        'parieurs' => true,
    ];
}
