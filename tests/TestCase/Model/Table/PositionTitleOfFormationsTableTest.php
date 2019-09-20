<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PositionTitleOfFormationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PositionTitleOfFormationsTable Test Case
 */
class PositionTitleOfFormationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PositionTitleOfFormationsTable
     */
    public $PositionTitleOfFormations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PositionTitleOfFormations',
        'app.Formations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PositionTitleOfFormations') ? [] : ['className' => PositionTitleOfFormationsTable::class];
        $this->PositionTitleOfFormations = TableRegistry::getTableLocator()->get('PositionTitleOfFormations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PositionTitleOfFormations);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
