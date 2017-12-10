<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use function debug;
use function var_dump;
use Cake\Http\Cookie\Cookie;
use Cake\Http\Cookie\CookieCollection;
use Cake\I18n\I18n;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
//  public $components = ['Cookie'];

    public $paginate = [
      'order' => ['id' => 'desc'],
      'limit' => 10
    ];

  public function initialize()
  {
    parent::initialize();
    $this->viewBuilder()->setLayout('usersLayout');

//    $this->loadComponent('Security');
//    $this->loadComponent('Security', ['blackHoleCallback' => 'forceSSL']);
/*    $this->Cookie->setConfig('path', '/');
    $this->Cookie->setConfig([
      'expires' => '+10 days',
      'httpOnly' => true
    ]);*/
/*    $this->Cookie->configKey('name', 'encryption', false);
    $this->Cookie->configKey('name', [
      'expires' => '+10 days',
      'httpOnly' => true
    ]);*/
//    $this->Cookie->write('name', '쿠키를 사용하여 이름을 표시합니다.');
//    $this->Cookie->write('user', ['name' => '홍길동', 'role' => '관리자']);
  }

  /**
   * Before render callback.
   *
   * @param \Cake\Event\Event $event The beforeRender event.
   * @return \Cake\Network\Response|null|void
   */
  public function beforeFilter(Event $event)
  {
    parent::beforeFilter($event);
    $this->Auth->allow(['index', 'login', 'add', 'viewForm', 'viewHtml', 'viewNumber', 'viewPaginator', 'viewSession', 'viewText', 'viewTime', 'viewUrl']);
    $this->set('Auth', $this->Auth);
//    $this->Security->setConfig('unlockedActions', ['edit']);
/*    if ($this->request->getParam('admin')) {
      $this->Security->requireSecure();
    }*/
//    $this->Security->setConfig('blackHoleCallback', 'blackhole');
//    $this->getEventManager()->off($this->Csrf);
  }

  public function forceSSL()
  {
    return $this->redirect('https://' . env('SERVER_NAME') . $this->request->getRequestTarget());
  }

  public function blackhole($type)
  {
    exit("Security blackhole.(".$type.")");
  }

  public function login()
  {
    if ($this->request->is('post')) {
      $user = $this->Auth->identify();
      if ($user) {
        $this->Auth->setUser($user);
        $this->Cookie->write('email', $user['email']);
        return $this->redirect($this->Auth->redirectUrl());
      }
      $this->Flash->error(__('이메일이나 비밀번호가 틀렸습니다. 다시 시도해 주세요.'));
    }
  }

  public function logout()
  {
    return $this->redirect($this->Auth->logout());
  }

  /**
   * Index method
   *
   * @return \Cake\Http\Response|void
   */
  public function index()
  {
    $users = $this->paginate($this->Users);
    $this->set(compact('users'));
    $this->set('_serialize', ['users']);

    // 쿠기 설정
/*    $cookie = (new Cookie('name'))
              ->withValue('안녕하세요.')
              ->withPath('/cookietest/')
              ->withDomain('example.com')
              ->withSecure(false)
              ->withExpiry(new \DateTime('+1 year'))
              ->withHttpOnly(true);

    $cookie2 = (new Cookie('name2'))
              ->withValue('안녕하세요2.')
              ->withPath('/')
              ->withDomain('example.com')
              ->withSecure(false)
              ->withExpiry(new \DateTime('+1 year'))
              ->withHttpOnly(true);

    $cookie3 = (new Cookie('name3'))
              ->withValue('안녕하세요3.')
              ->withPath('/')
              ->withDomain('example.com')
              ->withSecure(false)
              ->withExpiry(new \DateTime('+1 year'))
              ->withHttpOnly(true);

    $cookies = new CookieCollection([$cookie]);
    $cookies = $cookies->add($cookie2);
    $cookies = $cookies->add($cookie3);*/
//    $cookies = $cookies->remove('name');

/*    debug($cookies->get('name'));
    debug(count($cookies));
    debug($cookies->getIterator());

    $response = $this->response->withCookie($cookie);
    debug($response);
    debug($cookie->getValue());*/

//    $cookies = $cookies->remove('name2');
//    debug($cookies->getIterator());

/*    $this->Cookie->delete('user');
    debug($this->Cookie->read('name'));*/
/*    debug($this->Cookie->read('user'));
    debug($this->Cookie->read('user.name'));
    debug($this->Cookie->read('user.role'));*/
/*    debug($this->Cookie->check('user.name'));
    debug($this->Cookie->check('user.date'));*/
/*    $this->Cookie->delete('user.name');
    debug($this->Cookie->read('user'));
    $this->Cookie->delete('user');
    debug($this->Cookie->read('user'));*/
//    debug($this->Cookie->read('name'));

/*    $this->Flash->greatInfo('님 좋은 아침입니다.', [
      'key' => 'flash',
      'params' => ['name' => '홍길동']
    ]);*/
/*    $this->Flash->set('님 좋은 아침입니다.', [
      'element' => 'great_info',
      'params' => ['name' => '엄지공주']
    ]);*/
//    $this->Flash->set('플래시 메시지를 보여줍니다.');
//    debug($this->Auth->user()['role']);
//    debug($this->request->getSession()->read('Auth'));
//    debug($this->request->getParam('_csrfToken'));
//    debug($this->Cookie->read('email'));
  }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
      $user = $this->Users->get($id, ['contain' => []]);
      $this->set('user', $user);
      $this->set('_serialize', ['user']);
    }

  /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Auth->setUser($user->toArray());
                $this->Flash->success(__('유저를 저장하였습니다.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('저장을 실패하였습니다.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => 'editUser']);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('유저를 저장하였습니다.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('저장을 실패하였습니다.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('유저를 삭제하였습니다.'));
        } else {
            $this->Flash->error(__('삭제를 실패하였습니다.'));
        }

        return $this->redirect(['action' => 'index']);
    }

  public function viewForm()
  {
    I18n::setLocale('en_US');
    $user = $this->Users->newEntity();
/*    if ($this->request->is('post')) {
      $user = $this->Users->patchEntity($user, $this->request->getData());
      if ($this->Users->save($user)) {
        $this->Flash->success(__('user is saved.'));
      }
      $this->Flash->error(__('user save failed'));
    }*/
    $this->set(compact('user'));
    $this->set('_serialize', ['user']);
  }

  public function viewHtml()
  {
  }

  public function viewNumber()
  {
  }

  public function viewPaginator()
  {
    I18n::setLocale('en_US');
    $users = $this->paginate($this->Users);
    $this->set(compact('users'));
    $this->set('_serialize', ['users']);
  }

  public function viewSession()
  {
    $session = $this->request->getSession();
    $session->write('Member.name', 'HongGilDong');
    $session->write('Member.email', 'hong_gildong@cakephp.org');
    debug($session->read());
  }

  public function viewText()
  {
    $user = $this->Users->newEntity();
    $this->set(compact('user'));
    $this->set('_serialize', ['user']);
  }

  public function viewTime($id = null)
  {
    $user = $this->Users->get($id);
    $this->set(compact('user'));
    $this->set('_serialize', ['user']);
  }

  public function viewUrl()
  {
  }
}
