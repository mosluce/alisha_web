<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 */
class UsersController extends AppController {
	
	public $uses=array('Role', 'User');
	
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
				$this->Session->setFlash('Success to Register, and wait for approve');
				$this->redirect('/');
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
	
	public function edit($id=null) {
		if(parent::isAdmin()) $this->User->id = $id; 
		else $this->User->id = $this->Auth->user('id');
		if($this->request->is('get')) {
			$this->request->data = $this->User->read();
			$this->set('user', $this->request->data);
			$this->set('role_list', $this->Role->find('list'));
			$this->set('isAdmin', parent::isAdmin());
		} else {
			if($this->User->save($this->request->data)) {
				$this->Session->setFlash('User\'s data is updated');
// 				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash('Failed to update user\'s data.');
			}
		}
	}
	
	function delete($id) {
		if($this->request->is('get')) {
			throw new MethodNotAllowedException();
		} else {
			if($this->Post->delete($id)) {
				$this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
// 				$this->redirect($this->referer());
			}
		}
	}
	
	public $scaffold;
}
