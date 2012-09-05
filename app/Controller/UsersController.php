<?php
class UsersController extends AppController {
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('logout', 'register');
	}
	
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect(array('controller'=>'frontpages'));
			} else {
				$this->Session->setFlash('Login Failed');
			}
		}
	}
	
	public function register() {
		if ($this->request->is('post')) {
			if ($this->User->save($this->request->data)){
				$this->Session->setFlash('Successed, but waiting for approving');
				$this->redirect(array('controller'=>'frontpages'));
			}
		}
	}
	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
}