<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TblNihonFixture
 *
 */
class TblNihonFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tbl_nihon';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idx' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '번호', 'autoIncrement' => true, 'precision' => null],
        'wordnet_no' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '워드넷 번호', 'precision' => null, 'fixed' => null],
        'sentence_no' => ['type' => 'integer', 'length' => 8, 'unsigned' => true, 'null' => true, 'default' => '00000000', 'comment' => '예문 번호', 'precision' => null, 'autoIncrement' => null],
        'jap' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '일본어', 'precision' => null, 'fixed' => null],
        'kanji' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '일본한자', 'precision' => null, 'fixed' => null],
        'kor' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '한글', 'precision' => null, 'fixed' => null],
        'eng' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '영어', 'precision' => null, 'fixed' => null],
        'is_jlpt' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => 'JLPT 시험', 'precision' => null],
        'parts' => ['type' => 'string', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '품사', 'precision' => null, 'fixed' => null],
        'imagename' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '이미지명', 'precision' => null, 'fixed' => null],
        'regdate' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '등록일', 'precision' => null],
        '_indexes' => [
            'isJlpt' => ['type' => 'index', 'columns' => ['is_jlpt'], 'length' => []],
            'jap' => ['type' => 'index', 'columns' => ['jap'], 'length' => []],
            'wordnet_no_sentence_no' => ['type' => 'index', 'columns' => ['wordnet_no', 'sentence_no'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idx'], 'length' => []],
            'wordnetNo' => ['type' => 'unique', 'columns' => ['wordnet_no'], 'length' => []],
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
            'idx' => 1,
            'wordnet_no' => 'Lorem ipsum dolor ',
            'sentence_no' => 1,
            'jap' => 'Lorem ipsum dolor sit amet',
            'kanji' => 'Lorem ipsum dolor sit amet',
            'kor' => 'Lorem ipsum dolor sit amet',
            'eng' => 'Lorem ipsum dolor sit amet',
            'is_jlpt' => 1,
            'parts' => 'Lorem ipsum dolor sit amet',
            'imagename' => 'Lorem ipsum dolor ',
            'regdate' => 1488899555
        ],
    ];
}
