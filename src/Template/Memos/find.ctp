<?php $this->Html->css('memo', ['block' => true]); ?>
<?php echo $this->element("Head/head", ["viewName" => "Memo"]) ?>
<?php $this->Paginator->options(['url' => ['find' => "{$find}"]]); ?>

<div class="form large-9 medium-8 columns">
  <?= $this->Form->create() ?>
  <fieldset>
    <legend><?= __('Content 검색') ?></legend>
    <?= $this->Form->control('find', ['type'=>'text', 'label' => false, 'empty' => true, 'value' => "{$find}"]) ?>
    <?= $this->Form->button('Content 검색', ['type' => 'submit']) ?>
  </fieldset>
  <?= $this->Form->end() ?>
</div>

<table cellpadding="0" cellspacing="0">
  <thead>
  <tr>
    <th scope="col"><?= $this->Paginator->sort('id', '번호') ?></th>
    <th scope="col">내용</th>
    <th scope="col">생성일</th>
    <th scope="col">변경일</th>
    <th scope="col">액션</th>
  </tr>
  </thead>
  <tbody>
<?php if (isset($memos) && count($memos)) { ?>
  <?php foreach ($memos as $memo): ?>
  <tr>
    <td><?= $this->Number->format($memo->id) ?></td>
    <td><?= h($memo->content) ?></td>
    <td><?= $this->Time->format($memo->created, 'YYYY-MM-dd HH:mm:ss') ?></td>
    <td><?= $this->Time->format($memo->updated, 'YYYY-MM-dd HH:mm:ss') ?></td>
    <td><?= $this->Html->link(__('View'), ['action' => 'view', $memo->id]) ?>
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $memo->id]) ?>
      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $memo->id], ['confirm' => __('정말 {0}번을 삭제하실 건가요?',  $memo->id)]) ?>
    </td>
  </tr>
  <?php endforeach; ?>
  <?php } else { ?>
  <tr>
    <td colspan="5" style="text-align:center;">검색한 데이터가 없습니다.</td>
  </tr>
  <?php } ?>
</table>

<div class="paginator">
  <?php if (isset($memos) && count($memos)) { ?>
  <ul class="pagination">
    <?= $this->Paginator->first('<< ' . __('처음')) ?>
    <?= $this->Paginator->prev('< ' . __('앞')) ?>
    <?= $this->Paginator->numbers() ?>
    <?= $this->Paginator->next(__('다음') . ' >') ?>
    <?= $this->Paginator->last(__('마지막') . ' >>') ?>
  </ul>
  <p><?= $this->Paginator->counter(['format' => __('{{page}} / {{pages}} : {{current}}개 총{{count}}개')]) ?></p>
  <?php } ?>
</div>
