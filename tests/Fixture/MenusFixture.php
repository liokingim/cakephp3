<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MenusFixture
 *
 */
class MenusFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'menus';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'id', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'menu name', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => 'create date', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'modifiy date', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
/*    public $records = [
      [
        'id' => 1,
        'name' => 'Pizza',
        'created' => '2018-01-31 16:36:29',
        'modified' => '2018-01-31 16:36:29'
      ],
      [
        'id' => 2,
        'name' => 'Ramen',
        'created' => '2018-01-31 16:36:29',
        'modified' => '2018-01-31 16:36:29'
      ],
    ];*/

  public function init()
  {
    $this->records = [
      [
        'id' => 1,
        'name' => 'Pizza',
        'created' => date('Y-m-d H:i:s'),
        'modified' => date('Y-m-d H:i:s'),
      ],
      [
        'id' => 2,
        'name' => 'Ramen',
        'created' => date('Y-m-d H:i:s'),
        'modified' => date('Y-m-d H:i:s'),
      ],
    ];
    parent::init();
  }
}
