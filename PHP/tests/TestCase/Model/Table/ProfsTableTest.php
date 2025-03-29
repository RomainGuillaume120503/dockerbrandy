<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProfsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProfsTable Test Case
 */
class ProfsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProfsTable
     */
    protected $Profs;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Profs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Profs') ? [] : ['className' => ProfsTable::class];
        $this->Profs = $this->getTableLocator()->get('Profs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Profs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProfsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
