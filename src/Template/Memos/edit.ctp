<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create(null, ['url' => ['controller' => 'Memos', 'action' => 'edit']]) ?>
    <?= $this->Form->hidden('id', ['value'=> h($memo['id'])]) ?>
    <fieldset>
        <legend><?= __('메모 수정하기') ?></legend>
        <?php
            echo $this->Form->control("content", ['type' => 'text', 'label' => '메모 내용', 'value' => h($memo['content'])]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('메모 수정하기')) ?>
    <?= $this->Form->end() ?>
</div>
