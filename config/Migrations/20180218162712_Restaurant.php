<?php
use Migrations\AbstractMigration;

class Restaurant extends AbstractMigration
{
    public function up()
    {

        $this->table('articles')
            ->addColumn('user_id', 'integer', [
                'comment' => '작성자id',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('title', 'string', [
                'comment' => '제목',
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('content', 'text', [
                'comment' => '내용',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('isdelete', 'boolean', [
                'comment' => '삭제 플러그',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'comment' => '생성일',
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'comment' => '갱신일',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('categories')
            ->addColumn('parent_id', 'integer', [
                'comment' => '부모 ID',
                'default' => '0',
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('name', 'string', [
                'comment' => '카테고리명',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('lft', 'integer', [
                'comment' => '트리 구조',
                'default' => '0',
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('rght', 'integer', [
                'comment' => '트리 구조',
                'default' => '0',
                'limit' => 11,
                'null' => true,
            ])
            ->create();

        $this->table('comments')
            ->addColumn('customers_id', 'integer', [
                'comment' => '회원 번호',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('menu_id', 'integer', [
                'comment' => '메뉴 아이디',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('praise', 'integer', [
                'comment' => '칭찬',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('comment', 'text', [
                'comment' => '코멘트',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'comment' => '생성일',
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'comment' => '갱신일',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'menu_id',
                ]
            )
            ->addIndex(
                [
                    'customers_id',
                ]
            )
            ->create();

        $this->table('customers')
            ->addColumn('email', 'string', [
                'comment' => '회원 이메일',
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'comment' => '회원 이름',
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'comment' => '비밀번호',
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('anniversary', 'date', [
                'comment' => '기념일',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'comment' => '생성일',
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'comment' => '갱신일',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'anniversary',
                ]
            )
            ->addIndex(
                [
                    'email',
                ]
            )
            ->create();

        $this->table('i18n')
            ->addColumn('locale', 'string', [
                'default' => null,
                'limit' => 6,
                'null' => false,
            ])
            ->addColumn('model', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('foreign_key', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('field', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('content', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'locale',
                    'model',
                    'foreign_key',
                    'field',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'model',
                    'foreign_key',
                    'field',
                ]
            )
            ->create();

        $this->table('memos')
            ->addColumn('content', 'text', [
                'comment' => '메모',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('isdelete', 'boolean', [
                'comment' => '삭제 플래그',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'comment' => '생성일',
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'comment' => '갱신일',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('menus')
            ->addColumn('name', 'string', [
                'comment' => 'menu name',
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'comment' => 'create date',
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'comment' => 'modifiy date',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('sales')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('users')
            ->addColumn('email', 'string', [
                'comment' => '유저 이메일',
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'comment' => '유저이름',
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'comment' => '비밀번호',
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('phone', 'string', [
                'comment' => '전화번호',
                'default' => null,
                'limit' => 20,
                'null' => true,
            ])
            ->addColumn('status', 'boolean', [
                'comment' => '사용상태 사용:1/탈퇴:0',
                'default' => true,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('role', 'string', [
                'comment' => '유저 권한',
                'default' => null,
                'limit' => 20,
                'null' => true,
            ])
            ->addColumn('api_key_plain', 'string', [
                'comment' => 'api_key_plain',
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('api_key', 'string', [
                'comment' => 'api_key',
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('digest_hash', 'string', [
                'comment' => 'digest_hash',
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('articles_count', 'integer', [
                'default' => null,
                'limit' => 5,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('created', 'datetime', [
                'comment' => '생성일',
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'comment' => '갱신일',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
    }

    public function down()
    {
        $this->dropTable('articles');
        $this->dropTable('categories');
        $this->dropTable('comments');
        $this->dropTable('customers');
        $this->dropTable('i18n');
        $this->dropTable('memos');
        $this->dropTable('menus');
        $this->dropTable('sales');
        $this->dropTable('users');
    }
}
