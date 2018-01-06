<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Console\ConsoleOutput;
use function json_encode;

class HelloShell extends Shell
{
  public function main()
  {
    $this->out('Hello CakePHP 3.');
  }

  public function showName($name = 'Adam')
  {
    $this->out('My Name is ' . $name . ".");
    $this->dispatchShell([
      'command' => ['user', 'saveUser', '116'],
      'extra' => [
        'param' => '116'
      ]
    ]);
  }

  public function showJob($job = 'Cook')
  {
    $this->out('extra message', 1, Shell::VERBOSE);
    $this->verbose('Verbose output');

    $this->out("My Job is {$job}.", 1, Shell::QUIET);
    $this->quiet('My Job is ' . $job);

    $this->out('normal message', 1, Shell::NORMAL);
    $this->out('loud message', 1, Shell::VERBOSE);
    $this->verbose('Verbose output');
  }

  public function showOut()
  {
    $this->out('Normal message');
    $this->err('Error message');
    $this->abort('Fatal error');
    $this->verbose('Verbose message');
    $this->quiet('Quiet message');

    $this->out($this->nl(2));
    $this->clear();
    $this->hr();

    $this->out('Counting down:');
    $this->out('5', 0);
    for ($i = 5; $i > 0; $i--) {
      sleep(1);
      $this->_io->overwrite($i, 0, 2);
    }

    $data = ['name' => "pooh",
            'userid' => "10000",
            'location'=> "newyork",
            'tel' => "010-0123-3210"];
    $this->createFile('c:\xampp\htdocs\cakephp3\logs\shell.json', json_encode($data));

    $this->out('Quiet message', 1, Shell::QUIET);
    $this->quiet('Quiet message');
    $this->out('normal message', 1, Shell::NORMAL);
    $this->out('Verbose message', 1, Shell::VERBOSE);
    $this->verbose('Verbose message');

    $this->_io->setOutputAs(ConsoleOutput::RAW);
    $this->_io->styles('flashy', ['text' => 'magenta', 'blink' => true]);
    $this->out('<flashy>Normal message</flashy>');
  }
}