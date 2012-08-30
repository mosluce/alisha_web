<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 */
class UsersController extends AppController {
	
	public function login() {
		
	}
	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
	
	public $scaffold;
}
