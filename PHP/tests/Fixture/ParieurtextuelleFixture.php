<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ParieurtextuelleFixture
 */
class ParieurtextuelleFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'parieurtextuelle';
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
                'refParisText' => 1,
                'refUsers' => 1,
                'choix' => 1,
            ],
        ];
        parent::init();
    }
}
