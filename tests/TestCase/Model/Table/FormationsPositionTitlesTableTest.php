<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormationsPositionTitlesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormationsPositionTitlesTable Test Case
 */
class FormationsPositionTitlesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FormationsPositionTitlesTable
     */
    public $FormationsPositionTitles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FormationsPositionTitles',
        'app.Formations',
        'app.PositionTitles',
        'app.FormationStatuses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FormationsPositionTitles') ? [] : ['className' => FormationsPositionTitlesTable::class];
        $this->FormationsPositionTitles = TableRegistry::getTableLocator()->get('FormationsPositionTitles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FormationsPositionTitles);

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
