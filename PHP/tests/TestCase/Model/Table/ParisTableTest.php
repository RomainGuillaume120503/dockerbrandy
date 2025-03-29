<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParisTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParisTable Test Case
 */
class ParisTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ParisTable
     */
    protected $Paris;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Paris',
        'app.Profs',
        'app.Parieurs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Paris') ? [] : ['className' => ParisTable::class];
        $this->Paris = $this->getTableLocator()->get('Paris', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Paris);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ParisTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ParisTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
