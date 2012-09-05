<?php
class Course extends AppModel{
	
	public $belongsTo = 'User';
	
	public $validate = array(
		'name'=>array(
			'rule' => array('minLength', 8)
		)
	);
}