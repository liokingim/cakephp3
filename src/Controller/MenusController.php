<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Chronos\Chronos;
use function json_encode;
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
  }
}
