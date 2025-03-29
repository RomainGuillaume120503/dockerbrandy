<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HistoriqueFixture
 */
class HistoriqueFixture extends TestFixture
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
                'ref_users' => 1,
                'description' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
