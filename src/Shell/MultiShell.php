<?php
namespace App\Shell;

use Cake\Console\Shell;

class MultiShell extends Shell
{
  public function main($num)
  {
    $re = 0;
    $this->hr();
    for ($i = 1; $i <= 9; $i++) {
      $re = $i * $num;
      $this->out($num . " x " . $i . " = " . $re);
      $this->hr();
    }
  }
}