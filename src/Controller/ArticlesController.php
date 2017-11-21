<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\Exception\RecordNotFoundException;
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
    $this->Auth->allow(['index', 'view']);
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
      $article = $this->Articles->newEntity();
      if ($this->request->is('post')) {
          $article = $this->Articles->patchEntity($article, $this->request->getData());
          if ($this->Articles->save($article)) {
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
