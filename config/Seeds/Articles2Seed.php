<?php
use Migrations\AbstractSeed;

/**
 * Articles2Seed.
 */
class Articles2Seed extends AbstractSeed
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
            'user_id' => '3',
            'title' => '잔치국수',
            'content' => '잔치국수는 국물이 군더더기가 없는 맛이에요',
            'isdelete' => '0',
          ]
        ];

        $table = $this->table('articles');
        $table->insert($data)->save();
    }
}
