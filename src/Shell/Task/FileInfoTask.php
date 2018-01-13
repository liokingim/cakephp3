<?php
namespace App\Shell\Task;

use Cake\Console\Shell;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class FileInfoTask extends Shell
{
  public function main()
  {
    $this->out('Hello FileInfoTask.');
    $this->hr();
    $dir = new Folder("logs");
    $files = $dir->find('.*');
    foreach ($files as $file) {
      $this->out($file);
      $file = new File($dir->pwd() . DS . $file);
      $this->out($file->size());
      if ($file->ext() == "json") {
        $this->out($file->read());
      }
      $file->close();
    }
  }
}