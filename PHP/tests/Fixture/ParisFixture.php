<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ParisFixture
 */
class ParisFixture extends TestFixture
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
                'prof_id' => 1,
                'course_hour' => '19:14:38',
                'arrival_hour' => '19:14:38',
            ],
        ];
        parent::init();
    }
}
