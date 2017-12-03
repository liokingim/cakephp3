<?php
// $this->Paginator->setTemplates(['number' => '<em><a href="{{url}}">{{text}}</a></em> / ']);
// $result = $this->Paginator->getTemplates('number');
// echo $this->Paginator->sortDir('users');
// echo "sortKey: " . $this->Paginator->sortKey('users');
// echo $this->Paginator->first(3);
// echo $this->Paginator->limitControl([25 => 25, 50 => 50]);
/*$this->Paginator->options([
  'url' => [
    'sort' => 'email',
    'direction' => 'desc',
    'page' => 2,
  ]
]);*/
?>
<div class="users form large-10 medium-8 columns content">
  <table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
      <th scope="col"><?= $this->Paginator->sort('id', '<em>No</em>', ['escape' => false, 'direction' => 'desc', 'lock' => true]) ?></th>
      <th scope="col"><?= $this->Paginator->sort('email', null, ['lock' => true]) ?></th>
      <th scope="col"><?= $this->Paginator->sort('name') ?></th>
      <th scope="col"><?= $this->Paginator->sort("phone") ?></th>
      <th scope="col"><?= $this->Paginator->sort("created") ?></th>
      <th scope="col"><?= $this->Paginator->sort("modified") ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
      <tr>
        <td><?= $this->Number->format($user->id) ?></td>
        <td><?= h($user->email) ?></td>
        <td><?= h($user->name) ?></td>
        <td><?= h($user->phone) ?></td>
        <td><?= $this->Time->format($user->created, 'YYYY-MM-dd HH:mm:ss') ?></td>
        <td><?= $this->Time->format($user->updated, 'YYYY-MM-dd HH:mm:ss') ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <div class="paginator">
    <ul class="pagination">
      <?= $this->Paginator->first('<< ' . __('first')) ?>
      <?= $this->Paginator->prev('< ' . __('prev')) ?>
      <?= $this->Paginator->numbers(['before'=>'~', 'after'=>'~', 'modulus'=>5]) ?>
      <?= $this->Paginator->next(__('next') . ' >') ?>
      <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('{{page}}/{{pages}} : current:{{current}} total:{{count}}')]) ?></p>
  </div>
  <?= "generateUrl: " . $this->Paginator->generateUrl(['sort' => 'title']) ?><br>
  <?= 'current: ' . $this->Paginator->current() ?>
  <?= ', hasNext: ' . $this->Paginator->hasNext() ?>
  <?= ', hasPrev: ' . $this->Paginator->hasPrev() ?>
  <?= ', hasPage: ' . $this->Paginator->hasPage(11) ?>
  <?= ', total: ' . $this->Paginator->total() ?><br>
</div>