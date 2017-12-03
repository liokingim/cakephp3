<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('소개글 삭제'),
                ['action' => 'delete', $article->id],
                ['confirm' => __('정말 삭제하시겠습니까 # {0}?', $article->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('소개글 목록'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="articles form large-10 medium-8 columns content">
    <?php
    $this->Breadcrumbs->add([
      ['title' => 'Articles', 'url' => ['controller' => 'articles', 'action' => 'index']],
      ['title' => 'Articles edit', 'url' => ['controller' => 'articles', 'action' => 'edit']],
    ]);
    echo $this->Breadcrumbs->render(['class' => 'breadcrumbs']);
    ?>
    <fieldset>
      <legend><?= __('소개글 수정') ?></legend>
      <?= $this->Form->create($article) ?>
      <?php
          echo $this->Form->control('title', ['label' => '타이틀']);
          echo $this->Form->control('content', ['label' => '내용']);
      ?>
      <?= $this->Form->button(__('수정완료')) ?>
      <?= $this->Form->end() ?>
    </fieldset>
</div>
