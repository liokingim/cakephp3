<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <ul class="side-nav">
    <li class="heading"><?= __('{0}', ["메모장 액션"]) ?></li>
    <li><?= $this->Html->link(__('New '.$viewName), ['action' => 'add']) ?></li>
  </ul>
</nav>