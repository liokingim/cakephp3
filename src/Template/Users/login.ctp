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
  <div class="users form">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create() ?>
    <fieldset>
      <legend><?= __('유저 로그인') ?></legend>
      <?= $this->Form->control('email', ['label' => '이메일']) ?>
      <?= $this->Form->control('password', ['label' => '비밀번호']) ?>
    </fieldset>
    <?= $this->Form->button(__('로그인')); ?>
    <?= $this->Form->end() ?>
  </div>
</div>