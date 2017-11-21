<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\CustomersHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\CustomersHelper Test Case
 */
class CustomersHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\CustomersHelper
     */
    public $Customers;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Customers = new CustomersHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Customers);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
