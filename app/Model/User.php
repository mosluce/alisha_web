<?php
class User extends AppModel {
	
	public $belongsTo = 'Role';
	
	public $virtualFields = array(
		'mixname'=> 'CONCAT(User.enname, "-", User.twname)'
	);
	
	public $validate = array(
		'email'=>array(
			'rule'=>'email',
			'message'=>'Must be an email format.'
		),
		'password'=>array(
			'rule' => array('minLength', 8),
			'message' => 'Must be more than 8 chars.'
		),
		'enname'=>array(
			'rule' => array('minLength', 1),
			'message' => 'Not empty.'
		)
	);
	
	function beforeSave($options = array()) {
		$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
	}
}