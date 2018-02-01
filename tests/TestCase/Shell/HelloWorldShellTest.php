<?php
namespace App\Test\TestCase\Shell;

use Cake\TestSuite\ConsoleIntegrationTestCase;
use Cake\Console\Shell;

class HelloWorldShellTest extends ConsoleIntegrationTestCase
{
  public function testMain()
  {
    $this->exec('hello_world');
    $this->assertOutputContains('Hello CakePHP 3 World.');
  }

  public function testFileInfo()
  {
    $this->exec('file_info');
    $this->assertOutputContains('Hello FileInfoTask.');
    $this->assertOutputContains('cli-debug.log');
  }

  public function testHello()
  {
    $this->exec('hello');
    $this->assertOutputContains('Hello CakePHP 3.');

    $this->exec('hello show_job');
    $this->assertExitCode(Shell::CODE_SUCCESS);
    $this->assertOutputContains('My Job is Cook');
  }

  public function testUserEnter()
  {
    $this->exec('user_enter', ['R']);
    $this->assertExitCode(Shell::CODE_SUCCESS);
    $this->assertOutputContains('Your hobby is reading');
  }
}