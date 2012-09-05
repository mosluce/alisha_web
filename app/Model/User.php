<?php
class User extends AppModel {
	
	public $belongsTo = 'Role';
	
	public $virtualFields = array(
		'fullname'=> 'CONCAT(User.firstname, " ", User.lastname)'
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
		'firstname'=>array(
			'rule' => array('minLength', 1),
			'message' => 'Not empty.'
		),
		'lastname'=>array(
			'rule' => array('minLength', 1),
			'message' => 'Not empty.'
		)
	);
	
	function beforeSave($options = array()) {
		$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
	}
}