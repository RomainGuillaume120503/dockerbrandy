<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransfertTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransfertTable Test Case
 */
class TransfertTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TransfertTable
     */
    protected $Transfert;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Transfert',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Transfert') ? [] : ['className' => TransfertTable::class];
        $this->Transfert = $this->getTableLocator()->get('Transfert', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Transfert);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TransfertTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
