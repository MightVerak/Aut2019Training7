<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormationStatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormationStatusesTable Test Case
 */
class FormationStatusesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FormationStatusesTable
     */
    public $FormationStatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FormationStatuses',
        'app.FormationsPositionTitles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FormationStatuses') ? [] : ['className' => FormationStatusesTable::class];
        $this->FormationStatuses = TableRegistry::getTableLocator()->get('FormationStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FormationStatuses);

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
