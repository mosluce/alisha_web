<!-- <pre>
<?php print_r($userData);?>
</pre>
 -->
<?php if ($loggedIn):?>
<p>
Login User &gt; 
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
	if ($userData['role_id'] == 99 || $userData['role_id'] == 1) {
		echo '<p>';
		echo $this->Html->link('Management', '/Adminpages');
		echo '</p>';  
	} else {
		
	}
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