<?php
/**
 * Created by PhpStorm.
 * User: liokingim
 * Date: 2017-09-12
 * Time: 오전 12:46
 */

namespace App\Controller;

use function array_merge;
use Cake\Datasource\ConnectionManager;
use Cake\Http\ServerRequest;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Network\Session;
use Cake\Network\Exception\NotFoundException;
use DateTime;
use function debug;
use function var_dump;

class MemosController extends AppController
{
  private $conn = null;
  private $session = null;
  public $paginate = [
    'fields' => ['id', 'content', 'isdelete', 'created', 'updated'],
    'conditions' => array('isdelete' => 0),
    'order' => ['id' => 'desc'],
    'limit' => 10
  ];
  public $helpers = [
//    'Paginator' => ['templates' => 'paginator-templates']
  ];

  public function initialize()
  {
    parent::initialize();
    $this->conn = ConnectionManager::get('memodb');
    $this->name = "Memos";
    $this->autoRender = false;
    $this->session = new Session();
    $this->loadComponent('Paginator');
  }

  public function index()
  {
    try {
      /*      $memos = $this->conn->execute('SELECT * FROM memo')
                            ->fetchAll('assoc');*/

      /*      $memos = $this->conn->newQuery();
            $memos->select('*')
                  ->from('memo')
                  ->order(['id' => 'DESC'])
                  ->limit(20)
                  ->execute()
                  ->fetchAll('assoc');*/

/*      $memos = $this->conn->newQuery()
                          ->select('*')
                          ->from('memo')
                          ->where(['isdelete' => 0])
                          ->order(['id' => 'DESC'])
                          ->limit(20)
                          ->execute()
                          ->fetchAll('assoc');*/

/*      foreach ($memos as $memo) {
        var_dump($memo);
        debug($memo);
      }*/

      $this->Menos = TableRegistry::get('Memos');
      $this->Menos->setConnection($this->conn);

      $this->autoRender = true;
      $memos = $this->paginate($this->Menos);
      $this->set(compact('memos'));
//      $this->set('memos', $memos);
      $this->set('_serialize', ['memos']);
    } catch (NotFoundException $e) {
      $arrParams = $this->request->getQueryParams();
      $arrParams['page'] = 1;
      return $this->redirect(['controller' => $this->request->getParam('controller')
        , 'action' => $this->request->getParam('action')
        , '?' => $arrParams
      ]);
    }
  }

  public function find()
  {
    $this->Memos = [];
    $settings = [];
    $find = $this->session->read('find');

    if ($this->request->is('post') && empty($this->request->getData()['find'])) {
      $this->session->delete('find');
      $find = "";
    }

    if ($this->request->is('post') && !empty($this->request->getData()['find'])) {
      $find = trim($this->request->getData()['find']);
      $find = preg_replace("/[^A-Za-z0-9\-\']/", "", $find);
      $this->session->write('find', $find);
    }

//      debug($this->request->getQueryParams());

    try {
      if (!empty($find)) {
        $this->paginate['conditions'] = array_merge($this->paginate['conditions'], array('content LIKE' => "%{$find}%"));
        $this->Memos = TableRegistry::get('Memos');
        $this->Memos->setConnection($this->conn);
        $memos = $this->paginate($this->Memos);
      }
    } catch (NotFoundException $e) {
      $arrParams = $this->request->getQueryParams();
      $arrParams['page'] = 1;
      return $this->redirect(['controller' => $this->request->getParam('controller')
        , 'action' => $this->request->getParam('action')
        , '?' => $arrParams
      ]);
    }

    $this->set(compact('memos'));
    $this->set(compact('find'));
    $this->set('_serialize', ['memos']);
    $this->autoRender = true;
  }

  public function add()
  {
//    $stmt = $this->conn->query('INSERT INTO memo (content) VALUES ("새끼가 알을 깨고 나오자 수컷 물꿩이 초조해졌다.")');
    if ($this->request->is('post')) {
      if (!$this->request->getData()['content']) {
        $this->Flash->error(__('메모를 입력하여 주세요.'));
        return $this->redirect(['action' => 'add']);
      }

/*      $stmt = $this->conn->execute('INSERT INTO memo (content) VALUES (:content)'
                                        , ['content' => $this->request->getData()['content']]);*/
      $stmt = $this->conn->insert('memo', ['content' => $this->request->getData()['content']]);
      $id = $stmt->lastInsertId('id');
      if ($id) {
        $this->Flash->success(__('새로운 메모가 저장되었습니다. {0}', $id));
        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('메모가 저장되지 않았습니다.'));
    }

    $this->autoRender = true;
  }

  public function view($id = null)
  {
    try {
      if ($id == null) {
        return $this->redirect(['action' => 'index']);
      }

/*      $memo = $this->conn->execute('SELECT * FROM memo WHERE id = :id', ['id' => $id])
        ->fetchAll('assoc');*/

      $memo = $this->conn->newQuery()
                  ->select('*')
                  ->from('memo')
                  ->where(['id' => $id])
                  ->execute()
                  ->fetchAll('assoc');

      foreach ($memo as $value) {
//        var_dump($value);
      }

      $this->autoRender = true;
      $this->set('memo', $memo[0]);
      $this->set('_serialize', ['memo']);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function edit($id = null)
  {
    if ($this->request->is('post')) {
      if (!$this->request->getData()['id']
          || !$this->request->getData()['content']) {
        $this->Flash->error(__('수정할 내용을 입력하여 주세요.'));
        return $this->redirect(['action' => 'index']);
      }

      $id = $this->request->getData()['id'];
      $content = $this->request->getData()['content'];
      $date = new DateTime();
      $dt = $date->format('Y-m-d H:i:s');
//      $dt = Time::now();

/*      $stmt = $this->conn->update('memo', ['content' => $content
                                          , 'updated' => $dt]
                                        , ['id' => $id]);
        $stmt = $this->conn->execute(
            'UPDATE memo SET content = ?, updated = ? WHERE id = ?',
            [$content, $dt, $id],
            ['string', 'date', 'integer']
        );*/

      $query = $this->conn->newQuery();
      $query->update('memo')
            ->set(['content' => $content, 'updated' => $dt])
            ->where(['id' => $id]);
      $stmt = $query->execute();

      $this->Flash->success(__('메모가 수정되었습니다.'));
      return $this->redirect(['action' => 'index']);
    } else {
      if ($id == null) {
        return $this->redirect(['action' => 'index']);
      }

      $memo = $this->conn->newQuery()
        ->select('*')
        ->from('memo')
        ->where(['id' => $id])
        ->execute()
        ->fetch('assoc');

      $this->set('memo', $memo);
      $this->set('_serialize', ['memo']);
    }

    $this->autoRender = true;
  }

  public function delete($id = null)
  {
    if ($id == null) {
      $this->Flash->error(__('id가 없어서 삭제할 수 없습니다.'));
      return $this->redirect(['action' => 'index']);
    }

    $this->request->allowMethod(['post', 'delete']);

/*    $this->conn->delete('memo', ['id' => $id]);
    $this->conn->execute(
            'DELETE FROM memo WHERE id = ?',
            [$id],
            ['integer']);*/

/*    $date = new DateTime();
    $dt = $date->format('Y-m-d H:i:s');*/

    $now = Time::now();
    $dt = $now->i18nFormat('yyyy-MM-dd HH:mm:ss');

    $stmt = $this->conn->newQuery()
                        ->update('memo')
                        ->set(['isdelete' => 1, 'updated' => $dt])
                        ->where(['id' => $id])
                        ->execute();

    $this->Flash->success(__('메모가 삭제되었습니다.'));
    return $this->redirect(['action' => 'index']);
  }
}