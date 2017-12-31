<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\I18n;
use Cake\ORM\TableRegistry;
use \Cake\Datasource\Exception\RecordNotFoundException;
use function debug;
use function join;
use function json_encode;
use function var_dump;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 *
 * @method \App\Model\Entity\Category[] paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{
  public function initialize()
  {
    parent::initialize();
    I18n::setLocale('en_US');
  }

  public function beforeFilter(Event $event)
  {
    parent::beforeFilter($event);
    $this->Auth->allow(['index', 'view', 'add', 'moveCategories']);
  }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
      $categoriesList = $this->Categories->find('treeList');
      $this->set(compact('categoriesList'));

      $this->paginate = [
          'contain' => ['ParentCategories']
      ];
      $categories = $this->paginate($this->Categories);

      $this->set(compact('categories'));
      $this->set('_serialize', ['categories']);
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
      $category = $this->Categories->get($id, [
          'contain' => ['ParentCategories', 'ChildCategories']
      ]);
      $child = $this->Categories->childCount($category);
      $level = $this->Categories->getLevel($category);
      $this->set('child', $child);
      $this->set('level', $level);
      $this->set('category', $category);
      $this->set('_serialize', ['category']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $parentCategories = $this->Categories->ParentCategories->find('treeList', [
                              'spacer' => '-',
                              'limit' => 200
                            ]);
        $this->set(compact('category', 'parentCategories'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);
        $this->set(compact('category', 'parentCategories'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
      $this->request->allowMethod(['post', 'delete']);
      $category = $this->Categories->get($id);
      $this->Categories->removeFromTree($category);
      if ($this->Categories->delete($category)) {
          $this->Flash->success(__('The category has been deleted.'));
      } else {
          $this->Flash->error(__('The category could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index']);
    }

  public function moveCategories()
  {
    try {
      // moveUp, moveDown
      if ($this->request->is(['patch', 'post', 'put'])) {
        $move = $this->request->getParam('move');
        $id = $this->request->getParam('id');
        $node = $this->Categories->get($id);
        if ($move == 'up') {
          // moveUp
          if ($this->Categories->moveUp($node)) {
            $this->Flash->success(__('The category has been moveUp saved.'));
          } else {
            $this->Flash->error(__('The category could not be moveUp saved. Please, try again.'));
            return $this->redirect(['action' => 'index']);
          }
        } elseif ($move == 'down') {
          // moveDown
          if ($this->Categories->moveDown($node)) {
            $this->Flash->success(__('The category has been moveDown saved.'));
          } else {
            $this->Flash->error(__('The category could not be moveDown saved. Please, try again.'));
            return $this->redirect(['action' => 'index']);
          }
        }
      }

      // get Categories treeList
      $categories = $this->Categories->find('treeList', ['valuePath' => 'name', 'spacer' => '-']);
    } catch (RecordNotFoundException $e) {
      echo $e->getMessage();
    }

    $this->set(compact('categories'));
    $this->set('_serialize', ['categories']);
  }
}
