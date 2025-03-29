<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParieurtextuelleTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParieurtextuelleTable Test Case
 */
class ParieurtextuelleTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ParieurtextuelleTable
     */
    protected $Parieurtextuelle;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Parieurtextuelle',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Parieurtextuelle') ? [] : ['className' => ParieurtextuelleTable::class];
        $this->Parieurtextuelle = $this->getTableLocator()->get('Parieurtextuelle', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Parieurtextuelle);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ParieurtextuelleTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
