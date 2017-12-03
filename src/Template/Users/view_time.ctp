<div class="users form large-10 medium-8 columns content">
<?php
echo 'i18nFormat: ' . $this->Time->format($user->created, \IntlDateFormatter::FULL, null, $user->time_zone);
echo "<br>";
echo 'i18nFormat: ' . $this->Time->i18nFormat($user->created, 'YYYY-MM-dd HH:mm:ss');
echo "<br>";
echo 'time: ' . $time = time();
echo "<br>";
echo 'i18nFormat: ' . $this->Time->i18nFormat($time);
echo "<br>";
echo 'fromString: ' . $this->Time->fromString($time);
echo "<br>";
echo 'toUnix: ' . $this->Time->toUnix($time);
echo "<br>";
echo 'gmt: ' . $this->Time->gmt($time);
echo "<br>";
echo 'nice: ' . $this->Time->nice($time);
echo "<br>";
echo 'toAtom: ' . $this->Time->toAtom($time);
echo "<br>";
echo 'toRss: ' . $this->Time->toRss($time);
echo "<br>";
echo 'format: ' . $this->Time->format($time);
echo "<br>";
echo 'format: ' . $this->Time->format($time, "yyyy년MM월dd일 HH시mm분ss초");
echo "<br>";
echo 'isPast: ' . $this->Time->isPast($time);
echo "<br>";
echo 'isToday: ' . $this->Time->isToday($time);
echo "<br>";
echo 'isTomorrow: ' . $this->Time->isTomorrow($time);
echo "<br>";
echo 'isFuture: ' . $this->Time->isFuture($time);
echo "<br>";
echo 'isThisWeek: ' . $this->Time->isThisWeek($time);
echo "<br>";
echo 'isThisMonth: ' . $this->Time->isThisMonth($time);
echo "<br>";
echo 'isThisYear: ' . $this->Time->isThisYear($time);
echo "<br>";
echo 'isWithinNext: ' . $this->Time->isWithinNext('6 hours', $time);
echo "<br>";
echo 'wasWithinLast: ' . $this->Time->wasWithinLast('2 days', $time);
echo "<br>";
echo 'wasYesterday: ' . $this->Time->wasYesterday($time);
echo "<br>";
echo 'toQuarter: ' . $this->Time->toQuarter($time);
echo "<br>";
debug($this->Time->toQuarter($time, true));
?>
</div>