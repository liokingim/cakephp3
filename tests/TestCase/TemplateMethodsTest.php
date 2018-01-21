<?php
namespace App\Test\TestCase;

use Cake\TestSuite\TestCase;

class TemplateMethodsTest extends TestCase
{
  public static function setUpBeforeClass()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
  }

  public function setUp()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
  }

  public function assertPreConditions()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
  }

  public function testOne()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
    $this->assertTrue(true);
  }

  public function testTwo()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
    $this->assertTrue(false);
  }

  public function tearDown()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
  }

  public static function tearDownAfterClass()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
  }
}