<?php
class UserModel extends AppModel {
	
	function beforeSave($options = array()	) {
		$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		return true;
	}
}