<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
      <li class="heading"><?= __('액션') ?></li>
      <li>
        <?php
        if ($user['id'] == $article->user->id) {
          echo $this->Html->link(__('소개글 수정'), ['action' => 'edit', $article->id]);
        }
        ?>
      </li>
      <li>
        <?php
        if ($user['id'] == $article->user->id) {
          echo $this->Form->postLink(__('소개글 삭제'), ['action' => 'delete', $article->id], ['confirm' => __('정말로 삭제하시겠습니까 # {0}?', $article->id)]);
        }
        ?>
      </li>
      <li><?= $this->Html->link(__('소개글 작성'), ['action' => 'add']) ?> </li>
      <li><?= $this->Html->link(__('소개글 목록'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="articles view large-10 medium-8 columns content">
    <h3><?= h($article->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('작성자') ?></th>
            <td><?= h($article->user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('타이틀') ?></th>
            <td><?= h($article->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('작성일') ?></th>
            <td><?= h($article->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('내용') ?></h4>
        <?= $this->Text->autoParagraph(h($article->content)); ?>
    </div>
</div>
