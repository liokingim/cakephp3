<div class="users form large-10 medium-8 columns content">
<?php
echo "Member.name check: ". $this->request->session()->check('Member.name');
echo "<br>";
echo "Member.email check: ". $this->request->session()->check('Member.email');
echo "<br>";
echo "Member.address check: ". $this->request->session()->check('Member.address');
echo "<br>";
echo "Member.name read: ". $this->request->session()->read('Member.name');
echo "<br>";
echo "Member.email read: ". $this->request->session()->read('Member.email');
echo "<br>";
?>
</div>