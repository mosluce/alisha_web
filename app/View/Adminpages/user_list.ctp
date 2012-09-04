----------------- <br />
<?php
echo $this->Html->link('New User', array('action'=>'user_add'));
?>
<br /> -----------------
<table>
	<tr>
		<th>id</th>
		<th>Email/Account</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Role</th>
		<th>Actions</th>
	</tr>
	<?php foreach ($users as $user):?>
	<tr>
		<td><?php echo $user['User']['id']?></td>
		<td><?php echo $user['User']['email']?></td>
		<td><?php echo $user['User']['firstname']?></td>
		<td><?php echo $user['User']['lastname']?></td>
		<td><?php echo $user['Role']['name']?></td>
		<td>
			<?php echo $this->Html->link('Edit', array('action'=>'user_edit', $user['User']['id']))?>
			<?php echo $this->Form->postLink('Delete', array('action'=>'user_delete', $user['User']['id']), array('confirm'=>'Are You Sure?'))?>
		</td>
	</tr>
	<?php endforeach;?>
</table>