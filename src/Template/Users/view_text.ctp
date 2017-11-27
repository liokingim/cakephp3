<div class="users form large-10 medium-8 columns content">
<?php
$myText1 = 'For more information regarding our world-famous pastries and desserts,' .
          ' contact info@example.com, Contact Form http://example.com:1234/contact/';
echo '* autoLinkEmails: ' . $this->Text->autoLinkEmails($myText1);
echo "<br>";
echo '* autoLinkUrls: ' . $this->Text->autoLinkUrls($myText1);
echo "<br>";
echo '* autoLink: ' . $this->Text->autoLink($myText1);
echo "<br>";

$myText2 = 'For more information
regarding our world-famous pastries and desserts.

contact info@example.com';
echo '* autoParagraph: ' . $this->Text->autoParagraph($myText2);
echo "<br>";
echo '* highlight: ' . $this->Text->highlight($myText1, 'pastries', array('format' => '<strong>\1</strong>'));
echo "<br>";
$myText3 = 'contact to: ' . '<a href="http://example.com:1234/contact/" target="_blank">http://example.com:1234/contact/</a>';
echo '* stripLinks: ' . $this->Text->stripLinks($myText3);
echo "<br>";
echo '* excerpt: ' . $this->Text->excerpt($myText1, 'pastries', 30, '...');
echo "<br>";
echo '* tail: ' . $this->Text->tail($myText1, 30, ['ellipsis' => '...']);
echo "<br>";
echo '* truncate: ' . $this->Text->truncate($myText1, 30);
echo "<br>";
$colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
echo '* toList: ' . $this->Text->toList($colors);
echo "<br>";
?>
</div>