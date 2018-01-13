<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Console\ConsoleOptionParser;

class QueueShell extends Shell
{
//  public $tasks = ['QueueSound'];

  public function main()
  {
//    $this->QueueSound->main();
/*    $this->out('Hello QueueShell.');
    $this->hr();*/
  }

  public function getOptionParser()
  {
//    $parser = parent::getOptionParser();
    $parser = new ConsoleOptionParser();
    $parser->addArgument('type', ['help' => 'フルパスもしくはクラスの型のいずれか。'])
          ->addArgument('className', ['help' => 'CakePHP コアのクラス名（Component, HtmlHelper 等)。'])
          ->addOption('method', ['short' => 'm', 'help' => __('The specific method you want help on.')])
          ->setDescription(__('Lookup doc block comments for classes in CakePHP.'));
    return $parser;
  }
}