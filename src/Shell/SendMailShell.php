<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Mailer\Email;

class SendMailShell extends Shell
{
  public function main(){
    $email = new Email('default');
    $email->setTo('admin@engryword.com', 'To My Site');
    $email->setSubject('연습용 타이틀입니다');
    $email->send('안녕하세요. 연습용 본문을 보냅니다.');
  }
}