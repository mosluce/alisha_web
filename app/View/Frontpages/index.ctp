<?php if ($loggedIn):?>
<p>
<?php 
echo $userData['firstname'];
echo ' ';
echo $userData['lastname'];
?>
</p>
<?php endif;?>

<p>
<?php
if ($loggedIn) echo $this->Html->link('Logout', '/logout');
else echo $this->Html->link('Login', '/login');
?>
</p>