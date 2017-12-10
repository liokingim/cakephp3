<div class="users form large-10 medium-8 columns content">
  <?php
  echo $this->Form->create();
//  echo $this->Form->create($user, ['valueSources' => 'query']);
//  echo $this->Form->create($user, ["type" => "post", "url" => ["controller" => "users", "action" => "add"]]);
//  echo $this->Form->create($user, ["type" => "get", "url" => ["controller" => "users", "action" => "add"]]);
//  echo $this->Form->create($user, ['type' => 'file']);
//  echo $this->Form->create($user, ['enctype' => 'multipart/form-data']);
//  echo $this->Form->control('body');
//  echo $this->Form->control('title', ['label' => 'Title']);
  echo $this->Form->control('user_id');
  echo $this->Form->control('title', ['required' => true]);
  echo $this->Form->control('email', ['label' => 'email']);
  echo $this->Form->control('telephone');
  echo $this->Form->control('phone');
  echo $this->Form->control('passwd');
  echo $this->Form->control('name', ['label' => 'name']);
  echo $this->Form->text('name');
  echo $this->Form->control('password', ['label' => 'password']);
  echo $this->Form->control('password_confirm', ['label' => 'password_confirm', 'type' => 'password']);
  echo $this->Form->control('role', ['label' => 'role', 'options' => ['admin' => 'Admin', 'staff' => 'Staff'], 'default' => 'staff']);
  echo $this->Form->control('created');
  echo $this->Form->control('photo', ['type' => 'file']);
  echo $this->Form->control('username', ['default' => 'users name']);
  echo $this->Form->text('username', ['default' => 'users name']);
  echo $this->Form->control('username', ['class' => 'users']);
  echo $this->Form->text('username', ['class' => 'users']);
  echo $this->Form->control('id', ['type' => 'hidden', 'default' => '1']);
  echo $this->Form->hidden('id', ['value' => '1']);
  echo $this->Form->control('notes', ['type' => 'textarea', 'escape' => false, 'value'=>'notes content']);
  echo $this->Form->textarea('notes', ['default'=>'notes content']);
  echo $this->Form->control('close_time', ['type'=>'time', 'value' => '13:30:00']);
  echo $this->Form->time('close_time', ['value' => '13:30:00']);
  echo $this->Form->select('rooms', ['multiple' => true, 'value' => [1, 2, 3]]);
  echo $this->Form->select('rooms', [1, 2, 3, 4, 5], ['empty' => 'select?']);
  echo $this->Form->control('published', ['type'=>'checkbox', 'value' => '1']);
  echo "<br>";
  echo $this->Form->select('gender', ['M' => 'Male', 'F' => 'Female'], ['empty' => true]);
  echo $this->Form->checkbox('is_deleted', ['value' => '1']);
  echo "<br>";
  echo $this->Form->control('status', ['label' => 'status', 'checked']);
  echo "<br>";
  echo $this->Form->checkbox('published', ['hiddenField' => false]);
  echo "<br>";
  echo $this->Form->radio('gender', ['Masculine','Feminine','Neuter']);
  echo "<br>";
  echo $this->Form->radio('favorite_color',
    [
      ['value' => 'r', 'text' => 'Red', 'style' => 'color:red;'],
      ['value' => 'u', 'text' => 'Blue', 'style' => 'color:blue;'],
      ['value' => 'g', 'text' => 'Green', 'style' => 'color:green;'],
    ]
  );
  echo "<br>";
  echo $this->Form->label('User.name');
  echo "<br>";
  echo $this->Form->label('User.name', 'Your Name');
  echo "<br>";
  echo $this->Form->button(__('Regist'), ['type' => 'button']);
  echo "<br>";
  echo $this->Form->button(__('Reset'), ['type' => 'reset']);
  echo "<br>";
  echo $this->Form->button(__('Submit'));
  echo "<br><br><br>";
  echo $this->Form->button(__('Submit'), ['type' => 'submit']);
  echo "<br><br><br>";
  echo $this->Form->end();
//  echo $this->Form->end(['data-type' => 'hidden']);
  echo $this->Form->postButton(__('Delete User'), ['controller' => 'users', 'action' => 'delete', 1]);
  echo "<br><br><br>";
  echo $this->Form->postLink(__('View User'), ['controller' => 'users', 'action' => 'view', 1]);
  echo "<br><br><br>";
  echo $this->Form->create();
  echo $this->Form->control('id');
  $this->Form->secure(['id']);
  $this->Form->unlockField('id');
  echo $this->Form->end();
  echo "<br><br><br>";
  echo $this->Form->create($user);
  echo $this->Form->text('name');
  if ($this->Form->isFieldError('name')) {
    echo $this->Form->error('name', 'name is null.');
  }
  echo $this->Form->button(__('Submit'));
  echo $this->Form->end();
  ?>
</div>