<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParieursTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParieursTable Test Case
 */
class ParieursTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ParieursTable
     */
    protected $Parieurs;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Parieurs',
        'app.Paris',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Parieurs') ? [] : ['className' => ParieursTable::class];
        $this->Parieurs = $this->getTableLocator()->get('Parieurs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Parieurs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ParieursTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ParieursTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
