<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Console\ConsoleOptionParser;
use Cake\I18n\Time;

class MenusShell extends Shell
{
  public function initialize()
  {
    parent::initialize();
    $this->loadModel('Menus');
  }

  public function main()
  {
    $this->Menus->query()
                ->insert(['name'])
                ->values(['name' => 'Fried potato'])
                ->execute();
    $menu = $this->Menus->find()->last();
    $this->out('New Menu id: '. $menu->id);
  }

  public function updateMenu()
  {
    $id = $this->args[0];
    $this->Menus->query()
      ->update()
      ->set(['name' => 'Pasta', 'modified' => Time::now()])
      ->where(['id' => $id])
      ->execute();
    $this->out('Menu Updated.');
  }

  public function getOptionParser()
  {
    $parser = new ConsoleOptionParser();
    $parser
      ->setDescription('This Shell Program manages a menu.');
    return $parser;
  }
}