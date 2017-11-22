<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[]|\Cake\Collection\CollectionInterface $articles
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
      <li class="heading"><?= __('Actions') ?></li>
      <li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?></li>
      <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
      <li>
        <?php
        if(isset($user)) {
          echo $this->Html->link(__($user['name'] . ' 로그아웃'), ['controller' => 'Users', 'action' => 'logout']);
        } else {
          echo $this->Html->link(__('로그인'), ['controller' => 'Users', 'action' => 'login']);
        }
        ?>
      </li>
    </ul>
</nav>
<div class="articles index large-10 medium-8 columns content">
    <h3><?= __('소개글') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= h("작성자") ?></th>
                <th scope="col"><?= __("Title") ?></th>
                <th scope="col"><?= __("Created") ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= $this->Number->format($article->id) ?></td>
                <td><?= h($article->user->name) ?></td>
                <td><?= h($article->title) ?></td>
                <td><?= h($article->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $article->id]) ?>
                    <?php
                    if ($user['id'] == $article->user->id) {
                      echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['confirm' => __('정말 삭제하시겠습니까 # {0}?', $article->id)]);
                    }
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
      <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('처음으로')) ?>
        <?= $this->Paginator->prev('< ' . __('앞페이지')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('뒷페이지') . ' >') ?>
        <?= $this->Paginator->last(__('마지막으로') . ' >>') ?>
      </ul>
      <p><?= $this->Paginator->counter(['format' => __('{{page}} / {{pages}} : {{current}}개 총{{count}}개')]) ?></p>
    </div>
</div>
