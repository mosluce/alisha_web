<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 */
class UsersController extends AppController {
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('*');
		$this->set('title_for_layout', '課程網頁');
	}
	
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
	
	public function manage() {
		if(parent::isAdmin()) {
			$this->set('users', $this->User->find('all'));
		} else {
			$this->Session->setFlash('This page is not allowed to you');
			$this->redirect('/');
		}
	}
	
	function delete($id) {
		if($this->request->is('get')) {
			throw new MethodNotAllowedException();
		} else {
			if($this->Post->delete($id)) {
				$this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
// 				$this->redirect();
			}
		}
	}
	
	public $scaffold;
}
