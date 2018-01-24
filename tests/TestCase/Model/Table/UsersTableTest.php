<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use function var_dump;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{

  /**
   * Test subject
   *
   * @var \App\Model\Table\UsersTable
   */
  public $Users;

  /**
   * Fixtures
   *
   * @var array
   */
  public $fixtures = [
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
      $config = TableRegistry::exists('Users') ? [] : ['className' => UsersTable::class];
      $this->Users = TableRegistry::get('Users', $config);
  }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

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
     * Test beforeMarshal method
     *
     * @return void
     */
    public function testBeforeMarshal()
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
     * Test validationEditUser method
     *
     * @return void
     */
    public function testValidationEditUser()
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

  public function testFindUser()
  {
    $query = $this->Users->find('all')->first();
    $this->assertFalse(empty($query));
    $result = [['id' => $query->get('id'), 'email' => $query->get('email')]];
    $expected = [['id' => 1, 'email' => 'test01@cakephp.org']];
    $this->assertEquals($expected, $result);
    $this->assertTrue(empty($query));
  }
}
