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
if ($loggedIn) {
	echo $this->Html->link('Logout', '/logout');
} else {
	echo '<p>';
	echo $this->Html->link('Register', '/register');
	echo '</p>';
	echo '<p>';
	echo $this->Html->link('Login', '/login');
	echo '</p>';
}
?>
</p>