<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Chronos\Chronos;
use Cake\Chronos\ChronosInterface;
use Cake\Chronos\MutableDateTime;
use function json_encode;
use const JSON_PRETTY_PRINT;
use function var_dump;
use function debug;

/**
 * Menus Controller
 *
 * @property \App\Model\Table\MenusTable $Menus
 *
 * @method \App\Model\Entity\Menu[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MenusController extends AppController
{
  public function initialize()
  {
    parent::initialize();
//    $this->loadComponent( 'RequestHandler');
  }

  public function beforeFilter(Event $event)
  {
    parent::beforeFilter($event);
    $this->Auth->allow(['index', 'view', 'viewChronos']);
  }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $menus = $this->paginate($this->Menus);

        $this->set(compact('menus'));
    }

    /**
     * View method
     *
     * @param string|null $id Menu id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
      try {
        $menu = $this->Menus->get($id);
        $this->set('menu', $menu);
        $this->set('_serialize', ['menu']);
      } catch (RecordNotFoundException $e) {
        $this->autoRender = false;
        debug("RecordNotFoundException.");
      }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menu = $this->Menus->newEntity();
        if ($this->request->is('post')) {
            $menu = $this->Menus->patchEntity($menu, $this->request->getData());
            if ($this->Menus->save($menu)) {
                $this->Flash->success(__('The menu has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menu could not be saved. Please, try again.'));
        }
        $this->set(compact('menu'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Menu id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
      try {
        $menu = $this->Menus->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
          $menu = $this->Menus->patchEntity($menu, $this->request->getData());
          if ($this->Menus->save($menu)) {
            $this->Flash->success(__('The menu has been saved.'));

            return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('The menu could not be saved. Please, try again.'));
        }
        $this->set(compact('menu'));
      } catch (RecordNotFoundException $e) {
        $this->autoRender = false;
        debug("RecordNotFoundException.");
      }
    }

    /**
     * Delete method
     *
     * @param string|null $id Menu id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        try {
          $menu = $this->Menus->get($id);
          if ($this->Menus->delete($menu)) {
              $this->Flash->success(__('The menu has been deleted.'));
          } else {
              $this->Flash->error(__('The menu could not be deleted. Please, try again.'));
          }
        } catch (RecordNotFoundException $e) {
          $this->autoRender = false;
          debug("RecordNotFoundException.");
        }

        return $this->redirect(['action' => 'index']);
    }

  public function download($id = null)
  {
    $menus = $this->Menus->get($id);

    $this->response->withType('application/json');
    $this->response->getBody()->write(json_encode($menus));

    return $this->response->withDownload('download.json');
  }

  public function viewChronos($id = null)
  {
    $this->autoRender = false;
    debug("now: " . Chronos::now());
    debug("today: " . Chronos::today());
    debug("yesterday: " . Chronos::yesterday());
    debug("tomorrow: " . Chronos::tomorrow());

    // 문자형
    debug("parse: " . Chronos::parse('2018-01-01 11:30:00'));
    debug("parse Date / Time: " . Chronos::parse('+5 days, +3 hours'));

    // 숫자형
    debug("create: " . Chronos::create(2018, 2, 20, 10, 50, 50));
    debug("createFromDate: " . Chronos::createFromDate(2018, 2, 20));
    debug("createFromTime: " . Chronos::createFromTime(10, 50, 50));
    debug("createFromFormat: " . Chronos::createFromFormat('m/d/Y', '02/20/2018'));
    debug("create chain: " . Chronos::create()->year(2018)->month(2)->day(25)
                                      ->hour(4)->minute(30));

    // 타임존
    debug("timezone: " . Chronos::now()->timezone("UTC"));

    // 타임존 재설정 서울
    Chronos::now()->timezone('Asia/Seoul');
    $date = Chronos::parse('2018-07-01 01:00:00');
    debug("timezone Reset: " . $date);

    debug("addDay: " . $date->addDay(1)); // 1일 가산
    debug("subDay: " . $date->subDay(1)); // 1일 감산
    debug("addWeekday: " . $date->addWeekday(10)); // 휴일을 제외한 날짜의 가산.  10영업일 후
    debug("subWeekday: " . $date->subWeekday(10)); // 휴일을 제외한 날짜의 감산.  10영업일 전
    debug("addWeek: " . $date->addWeek(1)); // 1주일 가산
    debug("subWeek: " . $date->subWeek(1)); // 1주일 감산
    debug("addMonth: " . $date->addMonth(1)); // 1개월 감산
    debug("subMonth: " . $date->subMonth(1)); // 1개월 감산
    debug("firstOfMonth: " . $date->firstOfMonth(1)); // 첫 주 월요일 취득
    debug("lastOfMonth: " . $date->lastOfMonth(1)); // 마지막 주 월요일 취득

    // 지난주 월요일로 넘어가기
    debug("previous: " . $date->previous(ChronosInterface::MONDAY));
    // 다음주 수요일로 넘어가기
    debug("next: " . $date->next(ChronosInterface::TUESDAY));

    // 시간 비교
    $firstdate = Chronos::parse('2018-07-01 01:00:00');
    $seconddate = Chronos::parse('2018-06-20 01:00:00');
    $thirddate = Chronos::parse('2018-08-01 01:00:00');
    debug("=: " . $firstdate->eq($seconddate));
    debug("!=: " . $firstdate->ne($seconddate));
    debug(">: " . $firstdate->gt($seconddate));
    debug(">=: " . $firstdate->gte($seconddate));
    debug("<: " . $firstdate->lt($seconddate));
    debug("<=: " . $firstdate->lte($seconddate));

    // 기준이 된 날짜가 두 날짜의 사이에 있는지 확인
    debug("between: " . $firstdate->between($seconddate, $thirddate));
    // 두 날짜에서 가까운 날짜를 취득
    debug("closest: " . $firstdate->closest($seconddate, $thirddate));
    // 두 날짜에서 먼 날짜를 취득
    debug("farthest: " . $firstdate->farthest($seconddate, $thirddate));

    $now = Chronos::now();
    debug("now: " . $now);
    debug("isToday: " . $now->isToday());
    debug("isYesterday: " . $now->isYesterday());
    debug("isFuture: " . $now->isFuture());
    debug("isPast: " . $now->isPast());
    debug("isWeekday: " . $now->isWeekday());
    debug("isWeekend: " . $now->isWeekend());
    debug("isMonday: " . $now->isMonday());

    // 기간 내에 있었는지 확인
    debug("wasWithinLast: " . $now->wasWithinLast('3 days'));
    debug("isWithinNext: " . $now->isWithinNext('3 hours'));

    // 시간 차이
    $firstdate = Chronos::parse('2018-07-01 01:00:00');
    $seconddate = Chronos::parse('2018-07-30 01:00:00');

    debug("diff: " . json_encode($firstdate->diff($seconddate), JSON_PRETTY_PRINT));
    debug("diffInSeconds: " . $firstdate->diffInSeconds($seconddate));
    debug("diffInMinutes: " . $firstdate->diffInMinutes($seconddate));
    debug("diffInHours: " . $firstdate->diffInHours($seconddate));
    debug("diffInDays: " . $firstdate->diffInDays($seconddate));
    debug("diffInWeeks: " . $firstdate->diffInWeeks($seconddate));
    debug("diffInYears: " . $firstdate->diffInYears($seconddate));
    debug("diffForHumans: " . $firstdate->diffForHumans());
    debug("diffForHumans2: " . $firstdate->diffForHumans($seconddate));

    // 날짜 포맷 지정
    $time = Chronos::parse('2018-07-01 01:10:30');
    debug("toTimeString: " . $time->toTimeString());
    debug("toDateString: " . $time->toDateString());
    debug("toDateTimeString: " . $time->toDateTimeString());
    debug("toFormattedDateString: " . $time->toFormattedDateString());
    debug("toDayDateTimeString: " . $time->toDayDateTimeString());
    debug("toUnixString: " . $time->toUnixString());
    debug("toWeek: " . $time->toWeek());
    debug("toQuarter: " . $time->toQuarter());
    debug("toW3cString: " . $time->toW3cString());
    debug("toAtomString: " . $time->toAtomString());
    debug("toCookieString: " . $time->toCookieString());
    debug("toIso8601String: " . $time->toIso8601String());
    debug("toRfc822String: " . $time->toRfc822String());
    debug("toRfc850String: " . $time->toRfc850String());
    debug("toRfc1036String: " . $time->toRfc1036String());
    debug("toRfc1123String: " . $time->toRfc1123String());
    debug("toRfc2822String: " . $time->toRfc2822String());
    debug("toRfc3339String: " . $time->toRfc3339String());
    debug("toRssString: " . $time->toRssString());

    // 시간 추출
    $time = new Chronos('2018-07-25 05:30:00');
    debug("year: " . $time->year);
    debug("month: " . $time->month);
    debug("day: " . $time->day);
    debug("hour: " . $time->hour);
    debug("minute: " . $time->minute);
    debug("second: " . $time->second);

    // 테스트용
    // 현재의 시간 고정
    Chronos::setTestNow(Chronos::now());
    MutableDateTime::setTestNow(MutableDateTime::now());
    debug("MutableDateTime::getTestNow: " . MutableDateTime::getTestNow());

    // 과거의 시간 고정
    Chronos::setTestNow(new Chronos('2001-12-25 00:00:00'));
    debug("Chronos::getTestNow: " . Chronos::getTestNow());
  }
}
