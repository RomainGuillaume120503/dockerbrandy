<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ParistextuelleFixture
 */
class ParistextuelleFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'paristextuelle';
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
                'texte' => 'Lorem ipsum dolor sit amet',
                'estValide' => 1,
                'idCreateur' => 1,
            ],
        ];
        parent::init();
    }
}
