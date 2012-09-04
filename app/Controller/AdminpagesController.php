<?php
class AdminpagesController extends AppController {
	
	public $uses = array('User', 'Course');
	
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
		$courses = $this->Course->query("SELECT * FROM courses AS Course WHERE");
		$this->set('$courses', $courses);
	}
	
	public function user_add() {
		if($this->request->is('post')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Created');
				$this->redirect('/adminpages');
			} else {
				$this->Session->setFlash('Failed');
			}
		}
	}
	
	public function user_edit($id=null) {
		$this->User->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->User->read();
		} else {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Updated');
				$this->redirect('/adminpages');
			} else {
				$this->Session->setFlash('Failed');
			}
		}
	}
	
	public function user_delete() {
		
	}
}