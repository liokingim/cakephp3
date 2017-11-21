<div class="memo_head">
  <span class="memo_head_name"><?= __('{0}', ["메모장 액션"]) ?></span>
  <span class="memo_head_link">
    <?= $this->Html->link(__("+"), ['action' => 'add'], ["title" => 'New '.$viewName]) ?>
  </span>
  &nbsp;
  <span class="btn_memo">
    <?= $this->Html->link(__("Memo 찾기"), ['action' => 'find'], ["title" => 'Find '.$viewName]) ?>
  </span>
  &nbsp;
  <span class="btn_memo">
    <?= $this->Html->link(__("Memo 목록"), ['action' => 'index'], ["title" => 'List '.$viewName]) ?>
  </span>
</div>