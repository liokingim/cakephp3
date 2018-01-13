<?php
namespace App\Shell;

use Cake\Console\Shell;

class FileInfoShell extends Shell
{
  public $tasks = ['FileInfo'];

  public function main()
  {
    $this->FileInfo->main();
  }
}