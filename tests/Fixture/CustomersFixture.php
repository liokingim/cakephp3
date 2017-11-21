<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CustomersFixture
 *
 */
class CustomersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '번호', 'autoIncrement' => true, 'precision' => null],
        'email' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '회원 이메일', 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '회원 이름', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '비밀번호', 'precision' => null, 'fixed' => null],
        'anniversary' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '기념일', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '생성일', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '갱신일', 'precision' => null],
        '_indexes' => [
            'anniversary' => ['type' => 'index', 'columns' => ['anniversary'], 'length' => []],
            'email' => ['type' => 'index', 'columns' => ['email'], 'length' => []],
        ],
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
            'email' => 'Lorem ipsum dolor sit amet',
            'name' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'anniversary' => '2017-07-31',
            'created' => '2017-07-31 02:05:54',
            'modified' => '2017-07-31 02:05:54'
        ],
    ];
}
