<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AutoLoginTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AutoLoginTable Test Case
 */
class AutoLoginTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AutoLoginTable
     */
    public $AutoLogin;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.auto_login'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AutoLogin') ? [] : ['className' => AutoLoginTable::class];
        $this->AutoLogin = TableRegistry::getTableLocator()->get('AutoLogin', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AutoLogin);

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
