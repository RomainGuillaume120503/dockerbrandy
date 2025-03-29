<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HistoriqueTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HistoriqueTable Test Case
 */
class HistoriqueTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HistoriqueTable
     */
    protected $Historique;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Historique',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Historique') ? [] : ['className' => HistoriqueTable::class];
        $this->Historique = $this->getTableLocator()->get('Historique', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Historique);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HistoriqueTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
