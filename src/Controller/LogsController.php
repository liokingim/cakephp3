<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;
use \Monolog\Logger as Logger;
use Monolog\Handler\StreamHandler;
use Cake\Core\Configure;

class LogsController extends AppController
{
  protected $className;

  public function initialize()
  {
    parent::initialize();
    // 클래스명 취득
    $this->className = basename(get_class($this));
    $this->autoRender = false;
  }

  public function index() {
    echo $this->className." 로그 클래스 입니다.";

    // 각 레벨별로 로그 설정
    $this->log($this->className." index log...", 'emergency');
    $this->log($this->className." index log...", 'alert');
    $this->log($this->className." index log...", 'critical');
    $this->log($this->className." index log...", 'error');
    $this->log($this->className." index log...", 'warning');
    $this->log($this->className." index log...", 'notice');
    $this->log($this->className." index log...", 'info');
    $this->log($this->className." index log...", 'debug');

// var_dump(Log::getConfig('error')) ;
/*    Log::write('alert', $this->className." LOG_ALERT ...");
    Log::write(LOG_CRIT, $this->className." LOG_CRIT ...");
    Log::alert($this->className."  alert log...");
    Log::warning($this->className."  warning log...");
    Log::critical($this->className."  critical log...");*/
  }

  public function monolog() {
    // 로거 채널 생성
    $log =  new Logger($this->className);

    // 로그 파일 생성
    $log->pushHandler(new StreamHandler('logs/monolog.log', Logger::INFO));

    // 로그 생성
    $log->addInfo('Info log', array("a1"=>"a1value", "b1"=>"b1value"));
    // Debug 는 Info 레벨보다 낮으므로 출력되지 않음
    $log->addDebug('Debug log');
    // Error 레벨 출력
    $log->addError('Error log');
    // Critical 레벨 출력
    $log->addCritical('Critical log');
    // Emergency 레벨 출력
    $log->addEmergency('Emergency log');
  }
}
