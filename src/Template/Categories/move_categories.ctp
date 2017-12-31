<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <ul class="side-nav">
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?></li>
  </ul>
</nav>
<div class="categories index large-9 medium-8 columns content">
<?php
foreach ($categories as $id => $category) {
  echo $category."&nbsp";
  if ($id == 1) {
    echo "<br>";
  } else {
    echo $this->Form->postLink(__('∧'), ['action' => 'moveCategories', $id, 'up'])."&nbsp";
    echo $this->Form->postLink(__('∨'), ['action' => 'moveCategories', $id, 'down'])."<br>";
  }
}
?>
</div>