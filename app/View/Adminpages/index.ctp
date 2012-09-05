----------------- <br />
<?php 
echo $this->Html->link('Back', array('controller'=>'frontpages', 'action'=>'index'));
?>
<br />-----------------
<ul>
  <li> <?php echo $this->Html->link('User', array('action'=>'user_list'))?> </li>
  <li> <?php echo $this->Html->link('Course', array('action'=>'course_list'))?> </li>
</ul>

