----------------- <br />
<?php 
echo $this->Html->link('Back', array('action'=>'index'));
?>
<br />----------------- <br />
<?php
echo $this->Html->link('New Course', array('action'=>'course_add'));
?>
<br /> -----------------
<table>
  <tr>
  	<th>id</th>
    <th>Course Name</th>
    <th>Teacher Name</th>
    <th>Time List</th>
    <th>Planning</th>
    <th>Actions</th>
  </tr>
  <?php foreach ($courses as $course):?>
  <tr>
  	<td><?php echo $course['Course']['id']?></td>
    <td><?php echo $course['Course']['name']?></td>
    <td><?php echo $course['User']['fullname']?></td>
    <td>Working...</td>
    <td>
    	Working...
    	<?php //echo $this->Html->link('Go', array('action'=>'course_plan', $course['Course']['id'])); ?>
    </td>
    <td>
    	<?php echo $this->Html->link('Edit', array('action'=>'course_edit', $course['Course']['id'])); ?>
    	<?php echo $this->Form->postLink('Delete', array('action'=>'course_delete', $course['Course']['id']), array('confirm'=>'Are You Sure?')); ?>
    </td>
  </tr>
  <?php endforeach;?>
</table>
