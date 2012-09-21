----------------- <br />
<?php 
echo $this->Html->link('Back', array('action'=>'course_list'));
?>
<br />----------------- 
<p>New File</p>
<?php
echo $this->Form->create('CourseFile', array('type'=>'file'));
echo $this->Form->file('CourseFile.submittedfile');
echo $this->Form->input('description', array('label'=>'Description'));
echo $this->Form->end('Upload');
?>
<p>
====================================================
</p>
<p>File List</p>
<table>
	<tr>
		<th>ID</th>
		<th>File</th>
		<th>Description</th>
		<th>Action</th>
	</tr>
	
	<?php foreach ($files as $file):?>
	<tr>
		<td><?php echo $file['CourseFile']['id']?></td>
		<td><?php echo $this->Html->link($file['CourseFile']['filename'], '/Files/get_course_file/' . $file['CourseFile']['id'], array('target'=>'_blank'))?></td>
		<td><?php echo $file['CourseFile']['description']?></td>
		<td><?php echo $this->Form->postLink('Delete', array('action'=>'course_file_delete', $file['CourseFile']['id']), array('confirm'=>'Are You Sure?')); ?></td>
	</tr>
	<?php endforeach;?>
</table>