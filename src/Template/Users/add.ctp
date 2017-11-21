<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('유저 목록'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-10 medium-8 columns content">
  <?= $this->Form->create($user) ?>
  <fieldset>
    <legend><?= __('유저 추가') ?></legend>
    <?php
      echo $this->Form->control('email', ['label' => '이메일']);
      echo $this->Form->control('name', ['label' => '이름']);
      echo $this->Form->control('password', ['label' => '비밀번호']);
      echo $this->Form->control('password_confirm', ['label' => '비밀번호 확인', 'type' => 'password']);
      echo $this->Form->control('phone', ['label' => '전화번호']);
      echo $this->Form->control('status', ['label' => '회원상태', 'checked']);
      echo $this->Form->control('role', ['label' => '유저권한', 'options' => ['admin' => 'Admin', 'staff' => 'Staff'], 'default' => 'staff']);
    ?>
  </fieldset>
  <?= $this->Form->button(__('리셋'), ['type' => 'reset']) ?>
  <?= $this->Form->button(__('등록')) ?>
  <?= $this->Form->end() ?>
</div>
