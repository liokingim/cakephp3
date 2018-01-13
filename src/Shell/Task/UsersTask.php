<?php
namespace App\Shell\Task;

use Cake\Console\Shell;
use Cake\ORM\TableRegistry;

class UsersTask extends Shell
{
  public function main()
  {
    $this->out('--- UsersTask ---');
  }

  public function getUsers($cnt = 0)
  {
    $users = TableRegistry::get('Users');
    $data = $users->find()
                  ->order('id desc')
                  ->limit($cnt);
    return $data;
  }
}
