<?php
class AdminpagesController extends AppController {
	
	public $uses = array('User', 'Course', 'Role');
	
	function beforeFilter() {
		parent::beforeFilter();
		
		if ($this->Auth->user('role_id') != 99 && $this->Auth->user('role_id') != 1) {
			$this->redirect('/');
		}
		
		$this->set('title_for_layout', 'Admin Console');
	}
	
	public function index() {
		
	}
	
	public function user_list() {
		$users = $this->User->find('all', array('conditions'=>array('role_id !='=>99)));
		$this->set('users', $users);
	}
	
	public function course_list() {
		$this->set('courses', $this->Course->find('all'));
	}
	
	public function course_add() {
		if ($this->request->is('post')) {
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash('Successed');
				$this->redirect(array('action'=>'course_list'));
			} else {
				$this->Session->setFlash('Failed');
			}
		}
		
		$conditions = array('role_id != ' => 3);
		$this->set('teacherlist', $this->User->find('list',
				array(
						'conditions'=>$conditions,
						'fields'=>array('User.id', 'User.fullname')
				)));
	}
	
	public function course_edit($id=null) {
		$this->Course->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->Course->read();
		} else {
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash('Successed');
				$this->redirect(array('action'=>'course_list'));
			} else {
				$this->Session->setFlash('Failed');
			}
		}
		
		$conditions = array('role_id != ' => 3);
		$this->set('teacherlist', $this->User->find('list',
				array(
						'conditions'=>$conditions,
						'fields'=>array('User.id', 'User.fullname')
				)));
	}
	
	public function course_delete($id) {
		
	}
	
	public function user_add() {
		if($this->request->is('post')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Created');
				$this->redirect(array('action' => 'user_list'));
			} else {
				$this->Session->setFlash('Failed');
			}
		} 
		
		$conditions = array(
			'id !='=>99
		);
		$this->set('rolelist', $this->Role->find('list', array('conditions' => $conditions)));
	}
	
	public function user_edit($id=null) {
		$this->User->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->User->read();
		} else {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Updated');
				$this->redirect(array('action' => 'user_list'));
			} else {
				$this->Session->setFlash('Failed');
			}
		}
		
		$conditions = array(
				'id !='=>99
		);
		$this->set('rolelist', $this->Role->find('list', array('conditions' => $conditions)));
	}
	
	public function user_delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if ($this->User->delete($id)) {
			$this->Session->setFlash('Deleted');
			$this->redirect(array('action' => 'user_list'));
		}
	}
}