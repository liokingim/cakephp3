<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '번호', 'autoIncrement' => true, 'precision' => null],
        'email' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '유저 이메일', 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '유저이름', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '비밀번호', 'precision' => null, 'fixed' => null],
        'phone' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '전화번호', 'precision' => null, 'fixed' => null],
        'status' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '1', 'comment' => '사용상태 사용:1/탈퇴:0', 'precision' => null],
        'role' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '유저 권한', 'precision' => null, 'fixed' => null],
        'api_key_plain' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'api_key_plain', 'precision' => null, 'fixed' => null],
        'api_key' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'api_key', 'precision' => null, 'fixed' => null],
        'digest_hash' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'digest_hash', 'precision' => null, 'fixed' => null],
        'articles_count' => ['type' => 'integer', 'length' => 5, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '생성일', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '갱신일', 'precision' => null],
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
          'email' => 'test01@cakephp.org',
          'name' => 'honggildong',
          'password' => '111111',
          'phone' => '0101234021',
          'status' => 1,
          'role' => 'staff',
          'api_key_plain' => '',
          'api_key' => '',
          'digest_hash' => '',
          'articles_count' => 0,
          'created' => '2018-01-22 22:53:51',
          'modified' => '2018-01-22 22:53:51'
      ],
      [
        'id' => 2,
        'email' => 'test02@cakephp.org',
        'name' => 'animal',
        'password' => '111111',
        'phone' => '0101234021',
        'status' => 1,
        'role' => 'staff',
        'api_key_plain' => '',
        'api_key' => '',
        'digest_hash' => '',
        'articles_count' => 0,
        'created' => '2018-01-22 22:53:51',
        'modified' => '2018-01-22 22:53:51'
      ],
      [
        'id' => 3,
        'email' => 'test03@cakephp.org',
        'name' => 'fish',
        'password' => '222222',
        'phone' => '0101234021',
        'status' => 1,
        'role' => 'staff',
        'api_key_plain' => '',
        'api_key' => '',
        'digest_hash' => '',
        'articles_count' => 0,
        'created' => '2018-01-22 22:53:51',
        'modified' => '2018-01-22 22:53:51'
      ],
    ];
}
