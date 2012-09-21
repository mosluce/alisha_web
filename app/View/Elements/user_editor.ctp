<?php
echo $this->Form->create('User');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->input('enname', array('label'=>'Name'));
echo $this->Form->input('twname', array('label'=>'中文姓名'));

if(preg_match('/admin_/', $mode) == 1) {
	echo $this->Form->input('role_id', array('options'=>$rolelist, 'default'=>3));
}

switch ($mode) {
	case 'register':
		echo $this->Form->End('Register');
		break;
	case 'admin_add':
		echo $this->Form->End('Create');
		break;
	case 'admin_edit':
	case 'edit':
		echo $this->Form->End('Update');
		break;
}