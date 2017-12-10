<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\I18n\I18n;
use Cake\ORM\TableRegistry;
use function debug;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[] paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{
  public function initialize()
  {
    parent::initialize();
  }

  public function beforeFilter(Event $event)
  {
    parent::beforeFilter($event);
    $this->Auth->allow(['index', 'view', 'saveTrans', 'viewFindTransList', 'viewTrans']);
  }

  /**
   * Index method
   *
   * @return \Cake\Http\Response|void
   */
  public function index()
  {
    $this->paginate = [
        'contain' => ['Users'],
        'order' => ['id' => 'desc'],
        'limit' => 10
    ];
    $articles = $this->paginate($this->Articles);
    $user = $this->Auth->user();
    $this->set(compact('articles', 'user'));
    $this->set('_serialize', ['articles']);
  }

  /**
   * 3번째 레코드에 해당하는 번역문을 저장
   */
  public function saveTrans($lang = null)
  {
    $this->autoRender = false;
    $article = $this->Articles->get(3);
    debug($article->title);

    if ($lang == "en") {
      $article->_locale = 'en_US';
      $article->title = 'Bulgogi and Kimchi stew';
    } elseif ($lang == "ja") {
      $article->_locale = 'ja_JP';
      $article->title = '焼き肉とキムチチゲ';
    }

    if ($lang == "en" || $lang == "ja") {
      $this->Articles->save($article);
    }
  }

  /**
   * id에 해당하는 번역문 가져오기
   */
  public function viewTrans($id = null, $lang = null)
  {
    $this->autoRender = false;
    if ($id == null || $lang == null) {
      debug("id나 lang가 없습니다.");
      return;
    }

    if ($lang == "en") {
      I18n::setLocale('en_US');
    } elseif ($lang == "ja") {
      I18n::setLocale('ja_JP');
    }

    try {
      $article = $this->Articles->get($id);
      debug($article->_locale);
      debug($article->title);
    } catch (RecordNotFoundException $e) {
      debug("데이터가 없습니다.");
    }
  }

  public function viewFindTransList()
  {
    $this->autoRender = false;
    try {
      $article = $this->Articles->find('translations')->first();
      echo "en first <br>";
      echo $article->translation('en_US')->title;
      echo "ja first <br>";
      echo $article->translation('ja_JP')->title;

      $this->Articles->locale('en_US');
      $article2 = $this->Articles->get(3);
      debug($article2->title);

      $articles = $this->Articles->find('translations')->toList();
      foreach ($articles as $data) {
        echo $data->id . $data->title."<br>";
        echo $data->translation('en_US')->title."<br>";
        echo $data->translation('ja_JP')->title."<br>";
      }
    } catch (RecordNotFoundException $e) {
      debug("데이터가 없습니다.");
    }
  }

  /**
   * View method
   *
   * @param string|null $id Article id.
   * @return \Cake\Http\Response|void
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function view($id = null)
  {
    $article = $this->Articles->get($id, [
        'contain' => ['Users']
    ]);
    $user = $this->Auth->user();
    $this->set(compact('user'));
    $this->set('article', $article);
    $this->set('_serialize', ['article']);
  }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
      $usersTable = TableRegistry::get('Users');
      $article = $this->Articles->newEntity();
      if ($this->request->is('post')) {
          $article = $this->Articles->patchEntity($article, $this->request->getData());
          if ($this->Articles->save($article)) {
            // get Articles count
            $articles_count = $this->Articles->find('all', [
              'conditions' => ['Articles.user_id' => $this->Auth->user('id')]
            ])->count();

            // save users table
            $user = $usersTable->get($this->Auth->user('id'));
            $user->articles_count = $articles_count;
            $usersTable->save($user);

            $this->Flash->success(__('소개글을 저장하였습니다.'));
            return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('소개글 저장을 실패하였습니다. 다시 시도해주세요.'));
      }
//      debug($this->request->getSession()->read('Auth'));
//      debug($this->Auth->user());
      $user_id = $this->Auth->user()['id'];
      $this->set(compact('article', 'user_id'));
      $this->set('_serialize', ['article']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('소개글을 저장하였습니다.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('소개글 저장을 실패하였습니다. 다시 시도해주세요.'));
        }
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $this->set(compact('article', 'users'));
        $this->set('_serialize', ['article']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
      $this->request->allowMethod(['post', 'delete']);
      try {
        $article = $this->Articles->get($id);
        $user_id = $this->Auth->user()['id'];
        if ($user_id == $article['user_id']) {
          if ($this->Articles->delete($article)) {
            $this->Flash->success(__('소개글을 삭제하였습니다.'));
          } else {
            $this->Flash->error(__('소개글 삭제를 실패하였습니다. 다시 시도해주세요.'));
          }
        }
      } catch (RecordNotFoundException $e) {
        //
      }
      return $this->redirect(['action' => 'index']);
    }
}
