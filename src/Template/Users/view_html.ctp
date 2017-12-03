<div class="users form large-10 medium-8 columns content">
<?php
echo "charset: <xmp>" . $this->Html->charset() . "</xmp>" . PHP_EOL;
echo "<br>";
echo "charset: <xmp>" . $this->Html->charset('ISO-8859-1') . "</xmp>" . PHP_EOL;
echo "<br>";
echo "css: <xmp>" . $this->Html->css('forms') . "</xmp>" . PHP_EOL;
echo "<br>";
echo "css: <xmp>" . $this->Html->css(['forms', 'tables', 'menu']) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "style: <xmp>" . $this->Html->style(['background' => '#ffffff', 'border' => '1px solid #000']) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "meta: <xmp>" . $this->Html->meta('favicon.ico', '/favicon.ico', ['type' => 'icon']) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "meta rss: <xmp>" . $this->Html->meta('Comments', '/comments/index.rss', ['type' => 'rss']) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "meta keywords: <xmp>" . $this->Html->meta('keywords', 'meta tag') . "</xmp>" . PHP_EOL;
echo "<br>";
echo "meta description: <xmp>" . $this->Html->meta('description', 'Please write the explanation here.') . "</xmp>" . PHP_EOL;
echo "<br>";
echo "meta link: <xmp>" . $this->Html->meta(['link' => 'http://example.com', 'rel' => 'manifest']) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "docType: <xmp>" . $this->Html->docType() . "</xmp>". PHP_EOL;
echo "<br>";
echo "docType html4-trans: <xmp>" . $this->Html->docType('html4-trans') . "</xmp>" . PHP_EOL;
echo "<br>";
echo "div: <xmp>" . $this->Html->div('highlight', 'CakePHP') . "</xmp>". PHP_EOL;
echo "<br>";
echo "para: <xmp>" . $this->Html->para('highlight', 'CakePHP') . "</xmp>". PHP_EOL;
echo "<br>";
echo "image: <xmp>" . $this->Html->image('cake_logo.png', ['alt' => 'CakePHP']) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "image link: <xmp>" . $this->Html->image("cake_logo.png", ["alt" => "CakePHP", 'url' => ['controller' => 'Users', 'action' => 'view', 1]]) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "image plugin: <xmp>" . $this->Html->image('DebugKit.icon.png') . "</xmp>" . PHP_EOL;
echo "<br>";
echo "link: <xmp>" . $this->Html->link('Enter', '/users/add', ['class' => 'button', 'target' => '_blank']) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "fullbase link: <xmp>" . $this->Html->link('Users', ['controller' => 'Users', 'action' => 'index', '_full' => true]) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "javascript link: <xmp>" . $this->Html->link('Delete',
                                              ['controller' => 'Users', 'action' => 'delete', 1],
                                              ['confirm' => 'Are you sure you wish to delete?']
                                            ) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "query link: <xmp>" . $this->Html->link('View image', [
                                        'controller' => 'Images',
                                        'action' => 'view',
                                        1,
                                        '?' => ['height' => 400, 'width' => 500]
                                      ]) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "image link: <xmp>" . $this->Html->link($this->Html->image("cake_logo.png", ["alt" => "CakePHP"]),
                                        "users/view/1",
                                        ['escape' => false]
                                      ) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "audio: <xmp>" . $this->Html->media('audio.mp3') . "</xmp>" . PHP_EOL;
echo "<br>";
echo "video: <xmp>" . $this->Html->media('video.mp4', ['fullBase' => true, 'text' => 'Video']) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "video: <xmp>" . $this->Html->media(['video.mp4',
                                          ['src' => 'video.ogg', 'type' => "video/ogg; codecs='theora, vorbis'"]],
                                          ['autoplay']) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "javascript: <xmp>" . $this->Html->script('scripts') . "</xmp>" . PHP_EOL;
echo "<br>";
echo "javascript: <xmp>" . $this->Html->script(['jquery', 'wysiwyg', 'scripts']) . "</xmp>" . PHP_EOL;
echo "<br>";
$this->Html->scriptStart(['block' => true]);
echo "console.log('JavaScript');";
$this->Html->scriptEnd();
echo "<br>";
echo "fetch: <xmp>" . $this->fetch('script') . "</xmp>" . PHP_EOL;
echo "<br>";
$list = [
  'Languages' => [
    'English' => [
      'American',
      'Canadian',
      'British',
    ],
    'Spanish',
    'German',
  ]
];
echo "li: <xmp>" . $this->Html->nestedList($list) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "tag: <xmp>" . $this->Html->tag('table') . "</xmp>" . PHP_EOL;
echo "<br>";
echo "tableHeaders: <xmp>" . $this->Html->tableHeaders(['Date', 'Title', 'Active']) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "tableHeaders: <xmp>" . $this->Html->tableHeaders(['Date','Title','Active'],
                                                        ['class' => 'status'],
                                                        ['class' => 'product']) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "tableHeaders: <xmp>" . $this->Html->tableHeaders([
                                                        'Date',
                                                        ['Title' => ['class' => 'title']],
                                                        ['Active' => ['class' => 'active']]
                                                      ]) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "tableCells: <xmp>" . $this->Html->tableCells([
                                                      ['Jul 7th, 2015', 'CakePHP 3', '1'],
                                                      ['Jun 21st, 2007', 'CakePHP 2', '1'],
                                                      ['Aug 1st, 2000', 'CakePHP 1', '0'],
                                                    ]) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "tableCells: <xmp>" . $this->Html->tableCells([
                                                      ['Jul 7th, 2015', ['CakePHP 3', ['class' => 'title']] , '1'],
                                                      ['Jun 21st, 2007', 'CakePHP 2', '1'],
                                                      ['Aug 1st, 2000', 'CakePHP 1', ['0', ['id' => 'active']]],
                                                    ]) . "</xmp>" . PHP_EOL;
echo "<br>";
echo "tag: <xmp>" . $this->Html->tag('/table') . "</xmp>" . PHP_EOL;
echo "<br>";
$this->Html->addCrumb('Users', '/users');
echo "getCrumbs: <xmp>" . $this->Html->getCrumbs(' > ', 'Home') . "</xmp>" . PHP_EOL;
echo "<br>";
echo "getCrumbList: <xmp>" . $this->Html->getCrumbList() . "</xmp>" . PHP_EOL;
?>
</div>