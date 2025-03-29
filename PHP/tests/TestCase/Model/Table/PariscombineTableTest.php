<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PariscombineTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PariscombineTable Test Case
 */
class PariscombineTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PariscombineTable
     */
    protected $Pariscombine;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Pariscombine',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Pariscombine') ? [] : ['className' => PariscombineTable::class];
        $this->Pariscombine = $this->getTableLocator()->get('Pariscombine', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Pariscombine);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PariscombineTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
