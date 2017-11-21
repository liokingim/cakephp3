<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MenuFixture
 *
 */
class MenuFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'menu';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '아이디', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '메뉴명', 'precision' => null, 'fixed' => null],
        'price' => ['type' => 'integer', 'length' => 7, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '가격', 'precision' => null, 'autoIncrement' => null],
        'type' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'vegitableitable, non-vegitableitable', 'precision' => null, 'fixed' => null],
        'category' => ['type' => 'string', 'length' => 30, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Starters, SeaFood, Side Orders - Rice, Side Orders - Bread, Side Orders - Sundries, Dessert', 'precision' => null, 'fixed' => null],
        'create_at' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '생성일', 'precision' => null],
        'update_at' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '변경일', 'precision' => null],
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
    public $records = [
        [
            'id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'price' => 1,
            'type' => 'Lorem ipsum dolor ',
            'category' => 'Lorem ipsum dolor sit amet',
            'create_at' => '2017-05-23 21:27:07',
            'update_at' => '2017-05-23 21:27:07'
        ],
    ];
}
