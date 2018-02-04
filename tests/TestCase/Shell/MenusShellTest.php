<?php
namespace App\Test\TestCase\Shell;

use Cake\TestSuite\ConsoleIntegrationTestCase;
use Cake\Console\Shell;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

class MenusShellTest extends ConsoleIntegrationTestCase
{
  public $fixtures = ['app.menus'];

  public function testMain()
  {
    $now = Time::now();
    $this->loadFixtures('Menus');

    $this->exec('menus update_menu 1');
    $this->assertExitCode(Shell::CODE_SUCCESS);

    $menus = TableRegistry::get('Menus')->get(1);
    $this->assertEquals($menus->name, 'Pasta');
    $this->assertSame($menus->modified->timestamp, $now->timestamp);
  }
}