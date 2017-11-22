<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create(null, ['url' => ['controller' => 'Memos', 'action' => 'add']]) ?>
    <fieldset>
        <legend><?= __('새로운 메모 작성하기') ?></legend>
        <?php
            echo $this->Form->control("content", ['type' => 'text', 'label' => '메모 내용']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('메모 등록')) ?>
    <?= $this->Form->end() ?>
</div>
