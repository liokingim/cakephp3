<?php
namespace App\Shell;

use Cake\Console\Shell;

class HelloWorldShell extends Shell
{
  public function main()
  {
    $this->out('Hello CakePHP 3 World.');
  }
}