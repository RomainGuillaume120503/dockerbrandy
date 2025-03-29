<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CombineTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CombineTable Test Case
 */
class CombineTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CombineTable
     */
    protected $Combine;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Combine',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Combine') ? [] : ['className' => CombineTable::class];
        $this->Combine = $this->getTableLocator()->get('Combine', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Combine);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CombineTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
