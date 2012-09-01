<?php
class User extends AppModel {
	
	public $belongsTo = 'Role';
	
	public $confirm_password = 'User.password';
	
	public $validate = array(
			'email'=>'email',
			'password'=>array(
					'rule' => array('minLength', 8)
			),
			'firstname'=>array(
					'rule' => array('minLength', 1)
			),
			'lastname'=>array(
					'rule' => array('minLength', 1)
			)
	);
	
	function beforeSave($options = array()) {
		$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
	}
}