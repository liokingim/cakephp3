<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
      <li class="heading"><?= __('액션') ?></li>
      <li><?= $this->Html->link(__('소개글 목록'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="articles form large-10 medium-8 columns content">
  <?php
  $this->Breadcrumbs->add([
    ['title' => 'Articles', 'url' => ['controller' => 'articles', 'action' => 'index']],
    ['title' => 'Articles add', 'url' => ['controller' => 'articles', 'action' => 'add']],
  ]);
  echo $this->Breadcrumbs->render(['class' => 'breadcrumbs']);
  ?>
    <?= $this->Form->create($article) ?>
    <fieldset>
        <?php
            echo $this->Form->control('user_id', ['label' => '작성자',  'type' => 'hidden', 'id' => 'user_id', 'value' => $user_id]);
            echo $this->Form->control('title', ['label' => '타이틀']);
            echo $this->Form->control('content', ['label' => '본문']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('글 등록')) ?>
    <?= $this->Form->end() ?>
</div>
