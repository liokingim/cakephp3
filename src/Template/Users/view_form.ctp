<div class="users form large-10 medium-8 columns content">
  <?= $this->Form->create($user) ?>
  <fieldset>
    <legend><?= __('Form Helper') ?></legend>
    <?php
    echo $this->Form->control('email', ['label' => 'email']);
    echo $this->Form->control('name', ['label' => 'name']);
    echo $this->Form->control('password', ['label' => 'password']);
    echo $this->Form->control('password_confirm', ['label' => 'password_confirm', 'type' => 'password']);
    echo $this->Form->control('status', ['label' => 'status', 'checked']);
    echo $this->Form->control('role', ['label' => 'role', 'options' => ['admin' => 'Admin', 'staff' => 'Staff'], 'default' => 'staff']);
    ?>
  </fieldset>
  <?= $this->Form->button(__('리셋'), ['type' => 'reset']) ?>
  <?= $this->Form->button(__('등록')) ?>
  <?= $this->Form->end() ?>
</div>