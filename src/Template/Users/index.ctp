<nav class="large-2 medium-4 columns" id="actions-sidebar">
  <ul class="side-nav">
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(__('유저 추가'), ['action' => 'add']) ?></li>
    <li><?= $this->Html->link(__('소개글 목록'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
    <li>
      <?php
      if($this->request->session()->read('Auth')) {
        // $this->request->session()->read('Auth.User.role');
        echo $this->Html->link(__($Auth->user('role') . ' 로그아웃'), ['action' => 'logout']);
      } else {
        echo $this->Html->link(__('로그인'), ['action' => 'login']);
      }
      ?>
    </li>
  </ul>
</nav>
<div class="users index large-10 medium-8 columns content">
  <h3><?= __('유저') ?></h3>
  <table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
      <th scope="col"><?= $this->Paginator->sort('id', "아이디") ?></th>
      <th scope="col"><?= $this->Paginator->sort('email', "이메일") ?></th>
      <th scope="col"><?= $this->Paginator->sort('name',"이름") ?></th>
      <th scope="col"><?= h("전화번호") ?></th>
      <th scope="col"><?= h("소개글수") ?></th>
      <th scope="col"><?= h("생성일") ?></th>
      <th scope="col"><?= h("변경일") ?></th>
      <th scope="col" class="actions"><?= __('액션') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
      <tr>
        <td><?= $this->Number->format($user->id) ?></td>
        <td><?= h($user->email) ?></td>
        <td><?= h($user->name) ?></td>
        <td><?= h($user->phone) ?></td>
        <td><?= $this->Number->format($user->articles_count) ?></td>
        <td><?= $this->Time->i18nFormat($user->created, 'YYYY-MM-dd HH:mm:ss') ?></td>
        <td><?= $this->Time->i18nFormat($user->modified, 'YYYY-MM-dd HH:mm:ss') ?></td>
        <td class="actions">
          <?= $this->Html->link(__('상세'), ['action' => 'view', $user->id]) ?>
          <?= $this->Html->link(__('편집'), ['action' => 'edit', $user->id]) ?>
          <?= $this->Form->postLink(__('삭제'), ['action' => 'delete', $user->id], ['confirm' => __('정말 삭제하실건가요 {0}?', $user->id)]) ?>
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