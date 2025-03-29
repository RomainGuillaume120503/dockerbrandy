<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PariscombineFixture
 */
class PariscombineFixture extends TestFixture
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
                'refCombine' => 1,
                'refParis' => 1,
                'heureParie' => '12:16:29',
            ],
        ];
        parent::init();
    }
}
