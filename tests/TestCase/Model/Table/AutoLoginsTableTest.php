<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AutoLoginsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AutoLoginsTable Test Case
 */
class AutoLoginsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AutoLoginsTable
     */
    public $AutoLogins;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.auto_logins',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AutoLogins') ? [] : ['className' => AutoLoginsTable::class];
        $this->AutoLogins = TableRegistry::getTableLocator()->get('AutoLogins', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AutoLogins);

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
