<?php
/**
 * Created by PhpStorm.
 * User: liokingim
 * Date: 2018-01-04
 * Time: 오후 11:50
 */

namespace App\Shell;

use Cake\Console\Shell;

class HelloWorldShell extends Shell
{
  public function main()
  {
    $this->out('Hello CakePHP 3 World.');
  }
}