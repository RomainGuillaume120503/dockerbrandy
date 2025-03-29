<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransfertFixture
 */
class TransfertFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'transfert';
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
                'user_donneur' => 1,
                'user_receveur' => 1,
                'montant' => 1,
            ],
        ];
        parent::init();
    }
}
