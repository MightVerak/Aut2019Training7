<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StartRemindersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StartRemindersTable Test Case
 */
class StartRemindersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StartRemindersTable
     */
    public $StartReminders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.StartReminders',
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
        $config = TableRegistry::getTableLocator()->exists('StartReminders') ? [] : ['className' => StartRemindersTable::class];
        $this->StartReminders = TableRegistry::getTableLocator()->get('StartReminders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StartReminders);

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
