<?php
use Cake\I18n\Number;
?>
<div class="users form large-10 medium-8 columns content">
<?php
echo 'currency: ' . Number::currency(1234.56);
echo "<br>";
echo 'currency: ' . $this->Number->currency(1234.56);
echo "<br>";
echo 'currency(EUR): ' . $this->Number->currency(1234.56, 'EUR');
echo "<br>";
echo 'currency(GBP): ' . $this->Number->currency(1234.56, 'GBP');
echo "<br>";
echo 'currency(USD): ' . $this->Number->currency(1234.56, 'USD');
echo "<br>";
echo 'defaultCurrency: ' . $this->Number->defaultCurrency(1234.56);
echo "<br>";
echo 'format: ' . $this->Number->format(1234.5678);
echo "<br>";
echo 'format[fr_FR]: ' . $this->Number->format(1234.5678, ['locale' => 'fr_FR']);
echo "<br>";
echo 'format[]: ' . $this->Number->format(1234.5678, ['places' => 2, 'before' => '¥ ', 'after' => ' !']);
echo "<br>";
echo 'formatDelta: ' . $this->Number->formatDelta(1234.5678);
echo "<br>";
echo 'formatDelta[]: ' . $this->Number->formatDelta(1234.5678, ['places' => 2, 'before' => '[', 'after' => ']']);
echo "<br>";
echo 'ordinal: ' . $this->Number->ordinal(1);
echo "<br>";
echo 'ordinal: ' . $this->Number->ordinal(1, ['locale' => 'en_US']);
echo "<br>";
echo 'ordinal: ' . $this->Number->ordinal(2, ['locale' => 'en_US']);
echo "<br>";
echo 'ordinal[]: ' . $this->Number->ordinal(123, ['locale' => 'fr_FR']);
echo "<br>";
echo 'precision: ' . $this->Number->precision(1234.5678);
echo "<br>";
echo 'precision(2): ' . $this->Number->precision(1234.5678, 2);
echo "<br>";
echo 'toPercentage: ' . $this->Number->toPercentage(1234.5678);
echo "<br>";
echo 'toPercentage(2): ' . $this->Number->toPercentage(1234.5678, 2);
echo "<br>";
echo 'toPercentage[]: ' . $this->Number->toPercentage(1234.5678, 1, ['multiply' => true]);
echo "<br>";
echo 'toReadableSize: ' . $this->Number->toReadableSize(0);
echo "<br>";
echo 'toReadableSize: ' . $this->Number->toReadableSize(1234.5678);
echo "<br>";
echo 'toReadableSize: ' . $this->Number->toReadableSize(12345678);
echo "<br>";
echo 'toReadableSize: ' . $this->Number->toReadableSize(1234567890);
echo "<br>";
?>
</div>