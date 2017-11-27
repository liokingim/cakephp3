<div class="users form large-10 medium-8 columns content">
<?php
echo $this->Url->build();
echo "<br>";

echo $this->Url->build(["controller" => "Users", "action" => "view", "bar"]);
echo "<br>";

echo $this->Url->build(["controller" => "Users", "action" => "list", "_ext" => "rss"]);
echo "<br>";

echo $this->Url->build('/users', true);
echo "<br>";

echo $this->Url->build('/users', ['escape' => false, 'fullBase' => true]);
echo "<br>";

echo $this->Url->build(["controller" => "Users", "action" => "search", "?" => ["search" => "bar"], "#" => "first"]);
echo "<br>";

echo $this->Url->image('users.png');
echo "<br>";

echo $this->Url->script('users.js');
echo "<br>";

echo $this->Url->css('users.css');
echo "<br>";

echo $this->Url->build(['_name' => 'users-page', 'slug' => 'i-m-slug']);
?>
</div>