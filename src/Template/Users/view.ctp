<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
      <li><?= $this->Html->link(__('유저 추가'), ['action' => 'add']) ?> </li>
      <li><?= $this->Html->link(__('유저 수정'), ['action' => 'edit', $user->id]) ?> </li>
      <li><?= $this->Form->postLink(__('유저 삭제'), ['action' => 'delete', $user->id], ['confirm' => __('{0} 유저를 정말 삭제하시겠습니까?', $user->id)]) ?> </li>
      <li><?= $this->Html->link(__('유저 목록'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="users view large-10 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
      <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($user->id) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('이메일') ?></th>
          <td><?= h($user->email) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('이름') ?></th>
          <td><?= h($user->name) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('전화번호') ?></th>
          <td><?= h($user->phone) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('생성일') ?></th>
          <td><?= $this->Time->i18nFormat($user->created, 'YYYY-MM-dd HH:mm:ss') ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('변경일') ?></th>
          <td><?= $this->Time->i18nFormat($user->modified, 'YYYY-MM-dd HH:mm:ss') ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('회원상태') ?></th>
          <td><?= $user->status ? __('사용') : __('탈퇴'); ?></td>
      </tr>
    </table>
</div>
