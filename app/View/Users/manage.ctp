<table>
	<tr>
		<th>Email</th>
		<th>Actions</th>
		<th>Fist Name</th>
		<th>Last Name</th>
		<th>Role</th>
		<th>Active</th>
	</tr>
	<?php foreach ($users as $user):?>
	<tr>
		<td><?php echo $user['User']['email']?></td>
		<td>
			<?php echo $this->Html->link('edit', array('action'=>'edit', $user['User']['id']))?>
			<?php echo $this->Form->postLink('delete', array('action'=>'delete', $user['User']['id']), array('confirm'=>'Are You Sure?'))?>
		</td>
		<td><?php echo $user['User']['firstname']?></td>
		<td><?php echo $user['User']['lastname']?></td>
		<td><?php echo $user['User']['role_id']?></td>
		<td><?php echo $user['User']['active']?></td>
	</tr>
	<?php endforeach;?>
</table>