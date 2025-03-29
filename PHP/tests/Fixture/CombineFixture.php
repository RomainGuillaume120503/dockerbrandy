<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CombineFixture
 */
class CombineFixture extends TestFixture
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
                'refUser' => 1,
                'nbEcuParier' => 1,
                'nbEcuGagner' => 1,
                'cloture' => 1,
            ],
        ];
        parent::init();
    }
}
