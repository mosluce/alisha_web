<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 */
class UsersController extends AppController {
	
	public function login() {
		$this->set('title_for_layout', '使用者登入');
		
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
			}
		}
	}
	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
	
	public function register() {
		if ($this->request->is('post')) {
			if ($this->User->save($this->request->data)) {
				
			} else {
				
			}
		}
	}
	
	public $scaffold;
}
