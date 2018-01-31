<?php
namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\MenusController Test Case
 */
class MenusControllerTest extends IntegrationTestCase
{

  /**
   * Fixtures
   *
   * @var array
   */
  public $fixtures = [
      'app.menus',
  ];

  /**
   * Test index method
   *
   * @return void
   */
  public function testIndex()
  {
    $this->get('/menus');
    $this->assertResponseOk();
  }

  /**
   * Test view method
   *
   * @return void
   */
  public function testView()
  {
    $this->get('/menus/view');
    $this->assertResponseError();

    $this->get('/menus/view/1');
    $this->assertResponseOk();
    $this->assertResponseContains('Pizza');

    $this->get('/menus/view/2');
    $this->assertResponseError();
  }

  /**
   * Test add method
   *
   * @return void
   */
  public function testAdd()
  {
    $data = [
      'name' => 'Ramen',
    ];
    $this->post('/menus/add', $data);
    $this->assertResponseSuccess();

    $menus = TableRegistry::get('Menus');
    $query = $menus->find()->where(['name' => $data['name']]);
    $this->assertEquals(1, $query->count());

    $data = [
      'name' => '     ',
    ];
    $this->post('/menus/add', $data);
    $this->assertNoRedirect();
  }

  /**
   * Test edit method
   *
   * @return void
   */
  public function testEdit()
  {
    $this->get('/menus/edit/1');
    $this->assertResponseOk();
  }

  /**
   * Test delete method
   *
   * @return void
   */
  public function testDelete()
  {
    $this->post('/menus/delete');
    $this->assertResponseError();

    $this->get('/menus/delete/1');
    $this->assertResponseError();

    $this->post('/menus/delete/2');
    $this->assertResponseError();
  }

  public function testIpAccess()
  {
    $this->configRequest([
      'headers' => ['CLIENT_IP' => '12.34.56.78'],
      'environment' => ['REMOTE_ADDR' => '23.45.67.89']
    ]);
    $this->get('/menus');
    $this->assertResponseOk();
  }

  public function testBasicAuthentication()
  {
    $this->configRequest([
      'environment' => [
        'PHP_AUTH_USER' => 'username',
        'PHP_AUTH_PW' => 'password',
      ]
    ]);
    $this->get('/menus');
    $this->assertResponseOk();
  }
}
