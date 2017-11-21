<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message success" onclick="this.classList.add('hidden')">
  <?= h($params['name']) ?><?= h($message) ?>
</div>
