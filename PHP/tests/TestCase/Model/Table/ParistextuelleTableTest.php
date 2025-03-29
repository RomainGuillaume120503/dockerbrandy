<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParistextuelleTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParistextuelleTable Test Case
 */
class ParistextuelleTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ParistextuelleTable
     */
    protected $Paristextuelle;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Paristextuelle',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Paristextuelle') ? [] : ['className' => ParistextuelleTable::class];
        $this->Paristextuelle = $this->getTableLocator()->get('Paristextuelle', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Paristextuelle);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ParistextuelleTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
