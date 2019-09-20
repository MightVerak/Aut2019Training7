<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormationsPositionTitleOfFormationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormationsPositionTitleOfFormationsTable Test Case
 */
class FormationsPositionTitleOfFormationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FormationsPositionTitleOfFormationsTable
     */
    public $FormationsPositionTitleOfFormations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FormationsPositionTitleOfFormations',
        'app.Formations',
        'app.PositionTitleOfFormations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FormationsPositionTitleOfFormations') ? [] : ['className' => FormationsPositionTitleOfFormationsTable::class];
        $this->FormationsPositionTitleOfFormations = TableRegistry::getTableLocator()->get('FormationsPositionTitleOfFormations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FormationsPositionTitleOfFormations);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
