<?php
echo $this->Form->create('Course');
echo $this->Form->input('name');
echo $this->Form->input('user_id', array('options'=>$teacherlist));
switch ($mode) {
	case 'admin_add':
		echo $this->Form->end('Create');
		break;
	case 'admin_edit':
		echo $this->Form->end('Update');
		break;
}

echo '<pre>';
print_r($teacherlist);
echo '</pre>';