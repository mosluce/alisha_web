<?php
echo $this->Form->create('User');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->input('firstname');
echo $this->Form->input('lastname');

if($isAdmin) {
	echo $this->Form->input('role_id', array('options'=>$rolelist, 'default'=>3));
}

switch ($mode) {
	case 'admin_add':
		echo $this->Form->End('Create');
		break;
	case 'admin_edit':
	case 'edit':
		echo $this->Form->End('Update');
		break;
}