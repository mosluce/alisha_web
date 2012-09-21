<?php
echo $this->Form->create('Course');
echo $this->Form->input('academic_id', array('options'=>$academiclist, 'label'=>'Academic Year'));
echo $this->Form->input('name', array('label'=>'Course Name'));
echo $this->Form->input('name_tw', array('label'=>'課程名稱'));
echo $this->Form->input('user_id', array('options'=>$teacherlist, 'label'=>'Teacher'));
switch ($mode) {
	case 'admin_add':
		echo $this->Form->end('Create');
		break;
	case 'admin_edit':
		echo $this->Form->end('Update');
		break;
}

