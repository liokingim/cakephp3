<?php
namespace App\Test\TestCase\Controller;

use App\Controller\MenusController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;
use function var_dump;

/**
 * App\Controller\menusController Test Case
 */
class MenusControllerTest extends IntegrationTestCase
{
  public $fixtures = [
      'app.menus'
  ];

  public function testIndex()
  {
    $this->get('/menus');
    $this->assertResponseOk();
    $this->get('/menus?page=1');
    $this->assertResponseOk();
  }

  public function testView()
  {
    $this->get('menus/view/1');
    $this->assertResponseOk();

    // confirm created date
    $menus = TableRegistry::get('Menus');
    $query = $menus->find()->first();
    var_dump($query->created);
  }

  public function testAdd()
  {
    // auth login
    $this->session([
      'Auth' => [
        'User' => [
          'id' => 1,
          'email' => 'test01@cakephp.org',
          'name' => 'test',
        ]
      ]
    ]);
    $this->get('/menus/add');
    $this->assertResponseOk();

    // add new menu
    $this->enableRetainFlashMessages();
    $data = ['name' => 'salad',];
    $this->post('/menus/add', $data);
    $this->assertResponseSuccess();
    $this->assertSession( 'The menu has been saved.', 'Flash.flash.0.message');

    // confirm new menu
    $menus = TableRegistry::get('Menus');
    $query = $menus->find()->where(['name' => $data['name']]);
    $this->assertEquals(1, $query->count());
  }
}
