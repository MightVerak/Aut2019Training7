<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PositionTitlesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PositionTitlesTable Test Case
 */
class PositionTitlesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PositionTitlesTable
     */
    public $PositionTitles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PositionTitles',
        'app.Employees'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PositionTitles') ? [] : ['className' => PositionTitlesTable::class];
        $this->PositionTitles = TableRegistry::getTableLocator()->get('PositionTitles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PositionTitles);

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
