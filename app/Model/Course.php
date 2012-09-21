<?php
class Course extends AppModel{
	
	public $belongsTo = array('User', 'Academic');
	
	public $virtualFields = array(
			'mixname'=> 'CONCAT(Course.name, "-", Course.name_tw)'
	);
	
	public $validate = array(
		'name'=>array(
			'rule' => array('minLength', 8)
		)
	);
}