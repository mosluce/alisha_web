<p>Email:<?php echo $user['User']['email'];?></p>
<?php
echo $this->Form->create('User', array('action'=>'edit')); 
echo $this->Form->input('password');
echo $this->Form->input('firstname');
echo $this->Form->input('lastname');
echo $this->Form->input('role_id', array(
		'options' => $role_list));
echo $this->Form->input('active', array('type'=>'select', 'options'=>array('no', 'yes')));
echo $this->Form->end('Update');
