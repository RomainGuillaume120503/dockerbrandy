<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ParieursFixture
 */
class ParieursFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'paris_id' => 1,
                'user_id' => 1,
                'nbEcuParier' => 1,
                'nbEcuGagne' => 1,
                'heure_estimee' => '10:54:30',
            ],
        ];
        parent::init();
    }
}
