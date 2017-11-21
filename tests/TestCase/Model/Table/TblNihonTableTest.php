<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblNihonTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblNihonTable Test Case
 */
class TblNihonTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TblNihonTable
     */
    public $TblNihon;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tbl_nihon'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TblNihon') ? [] : ['className' => 'App\Model\Table\TblNihonTable'];
        $this->TblNihon = TableRegistry::get('TblNihon', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TblNihon);

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
