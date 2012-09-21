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
  	<th>Academic Year</th>
    <th>Course Name</th>
    <th>Teacher Name</th>
    <th>Files</th>
    <th>Time List</th>
    <th>Actions</th>
  </tr>
  <?php foreach ($courses as $course):?>
  <tr>
  	<td><?php echo $course['Course']['id']?></td>
  	<td><?php echo $course['Academic']['academic_num']?></td>
    <td>
    	<p>
    	<?php if($course['Course']['active'] == 1):?>
    		【<span style="color: green">
    			OPEN<?php echo $this->Html->link(' -> CLOSE', array('action'=>'course_status_sw', $course['Course']['id']))?>
    		</span>】
    	<?php else:?>
    		【<span style="color: red">
    			CLOSE<?php echo $this->Html->link(' -> OPEN', array('action'=>'course_status_sw', $course['Course']['id']))?>
    		</span>】
    	<?php endif;?>
    	</p>
    	<?php echo str_replace('-', '<br />', $course['Course']['mixname'])?>
    </td>
    <td><?php echo str_replace('-', '<br />', $course['User']['mixname'])?></td>
    <td>【<?php echo $this->Html->link('File Manager', array('action'=>'course_file_edit', $course['Course']['id']))?>】
    </td>
    <td>
    	【Planning】
    	<br />
    	---------------
    	<br />
    	Working... 
    </td>
    <td>
    	<?php echo $this->Html->link('Edit', array('action'=>'course_edit', $course['Course']['id'])); ?>
    </td>
  </tr>
  <?php endforeach;?>
</table>
