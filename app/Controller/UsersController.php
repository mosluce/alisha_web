<?php
class UsersController extends AppController {
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('logout');
	}
	
	public function login() {
		if ($this->Auth->login()) {
			$this->redirect($this->Auth->redirect());
		} else {
			$this->Session->setFlash('Login Failed');
		}
	}
	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
}