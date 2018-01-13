<?php
namespace App\Shell;

use Cake\Console\Shell;

class ParserHelpShell extends Shell
{
  public function main()
  {
  }

  public function getOptionParser()
  {
    $parser = parent::getOptionParser();
    $parser->setDescription(__('This is ParserHelpShell.'
      ."\n\n"
      .'Good Luck.'));
/*    $parser->addArgument('type', ['help' => 'フルパスもしくはクラスの型のいずれか。'])
      ->addArgument('className', ['help' => 'CakePHP コアのクラス名（Component, HtmlHelper 等)。'])
      ->addOption('method', ['short' => 'm', 'help' => __('The specific method you want help on.')])
      ->setDescription(__('Lookup doc block comments for classes in CakePHP.'));*/
    return $parser;
  }
}