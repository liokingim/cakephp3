<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Mailer\Email;
use function var_dump;

class UsersMailSendShell extends Shell
{
  public $tasks = ['Users'];
  public $saveData = null;
  public $email = null;

  public function initialize()
  {
    parent::initialize();
    $this->email = new Email('default');
  }

  public function main($cnt = 5)
  {
    $this->out('--- Users Mail Send Start ---');
    $this->Users->main();
    $usersData = $this->Users->getUsers($cnt);
    foreach ($usersData as $key => $user) {
      //$this->sendMail($user);
      if ($this->sendMail($user)) {
        $this->saveData[$user->id]['email'] = $user->email;
        $this->saveData[$user->id]['name'] = $user->name;
      } else {
        continue;
      }
    }
    $this->createFile('logs/users_mail_send.json', json_encode($this->saveData));
    $this->out('--- Users Mail Send End ---');
  }

  /**
   * Mail send
   *
   * @param $user
   * @return bool
   */
  public function sendMail($user)
  {
    $ret = false;
    $this->email->setTo($user->email, 'Hello CakeMail');
    $this->email->setSubject('CakePHP send mail~~~');

    try {
      $this->email->send();
      $ret = true;
    } catch (\Exception $e) {
      // Exception
    }

    return $ret;
  }
}
