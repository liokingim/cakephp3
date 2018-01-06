<?php

namespace App\Shell;

use Cake\Console\Shell;
use Cake\View\View;
use Cake\View\Helper\TimeHelper;

class UserShell extends Shell
{
  public $timeHelper = null;

  public function initialize()
  {
    parent::initialize();
    $this->loadModel('Users');
    $view = new View();
    $this->timeHelper = new TimeHelper($view);
  }

  public function main()
  {
    $this->out('Get User Model.');
  }

  public function saveUser($param = null)
  {
    $this->out('Get User id is ' . $param . ".");
    if (empty($this->args[0])) {
      return $this->abort('Please enter a Userid.');
    }

    $user = $this->Users->findById($this->args[0])->first();
    $this->out(print_r($user, true));
    if (isset($user)) {
      $data = [
        'id' => $user->id,
        'name' => $user->name,
        'phone' => $user->phone,
        'created' => $this->timeHelper->i18nFormat($user->created, 'YYYY-MM-dd HH:mm:ss'),
      ];
      $this->createFile('c:\xampp\htdocs\cakephp3\logs\user.json', json_encode($data));
    }
  }
}