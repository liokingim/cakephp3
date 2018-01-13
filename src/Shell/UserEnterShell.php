<?php
namespace App\Shell;

use Cake\Console\Shell;

class UserEnterShell extends Shell
{
  public function main()
  {
    $this->out('[R]eading, [G]ame, [M]ovie');
    $selection = $this->in('What is your hobby?', ['R', 'G', 'M'], 'R');
    $this->hr();
    if ($selection == 'R') {
      $this->out('Your hobby is reading');
    } elseif ($selection == 'G') {
      $this->out('Your hobby is game');
    } elseif ($selection == 'M') {
      $this->out('Your hobby is movie');
    } else {
      $this->out('Please select!');
    }
  }
}
