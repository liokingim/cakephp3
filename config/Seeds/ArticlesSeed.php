<?php
use Migrations\AbstractSeed;

/**
 * Articles seed.
 */
class ArticlesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'user_id' => '1',
                'title' => '한정식',
                'content' => '정갈하고 깔끔한 한식 요리',
                'isdelete' => '0',
                'created' => '2018-02-20 02:35:32',
                'modified' => '0000-00-00 00:00:00',
            ],
            [
                'id' => '2',
                'user_id' => '2',
                'title' => '잡채밥',
                'content' => '맨밥 대신 볶음밥이 들어가는 것',
                'isdelete' => '0',
                'created' => '2018-02-20 02:35:32',
                'modified' => '0000-00-00 00:00:00',
            ],
        ];

        $table = $this->table('articles');
        $table->insert($data)->save();
    }
}
