<?php
class AdminpagesController extends AppController {
	
	public $uses = array('User', 'Course', 'Role', 'CourseFile', 'Academic');
	
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
						'fields'=>array('User.id', 'User.mixname')
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
						'fields'=>array('User.id', 'User.mixname')
				)));
		
		$this->set('academiclist', $this->Academic->find('list', 
				array(
						'fields'=>array('Academic.id', 'Academic.academic_num')
				)));
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
	
	public function course_file_edit($course_id) {
		if($this->request->is('post')) {
			$data = $this->request->data;
			$filedata = $this->fileFactory($data['CourseFile']['submittedfile']);
			if($filedata != '') {
				$data['CourseFile']['course_id'] = $course_id;
				$data['CourseFile']['filename'] = $filedata['filename'];
				$data['CourseFile']['filepath'] = $filedata['filepath'];
				$data['CourseFile']['filetype'] = $filedata['filetype'];
				
				if($this->CourseFile->save($data)) {
					$this->Session->setFlash('Uploaded');
					$this->redirect($this->referer());
				} else {
					$this->Session->setFlash('Failed');
				}
			} else {
				$this->Session->setFlash('File is invalid');
			}
		}
		
		$this->paginate = array('limit'=>3, 'conditions'=>array('CourseFile.course_id' => $course_id));
		$files = array();
		$files = $this->paginate('CourseFile');
		$this->set('files', $files);
	}
	
	public function course_file_delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		//讀取資料預備刪除
		$this->CourseFile->id = $id;
		$filedata = $this->CourseFile->read();
		$filepath = $filedata['CourseFile']['filepath'];
		
		if ($this->CourseFile->delete($id)) {
			unlink($filepath);
			$this->Session->setFlash('Deleted');
			$this->redirect($this->referer());
		}
	}
	
	public function course_status_sw($id) {
		$this->Course->id = $id;
		$course = $this->Course->read();
		$course['Course']['active'] = abs($course['Course']['active'] - 1);
		$this->Course->save($course);
		$this->redirect($this->referer());
	}
	
	function fileFactory($file) {
		if($file['error'] == 0) {
			if(!file_exists($_SERVER['DOCUMENT_ROOT'] . '/uploads')) {
				mkdir($_SERVER['DOCUMENT_ROOT'] . '/uploads');
			}
			
			$filesplit = preg_split("/\./", $file['name']);
			$ext = $filesplit[count($filesplit) - 1];
			$savename = $this->Auth->user('id') . '_' . time() . '.' . $ext;
			$savepath = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $savename;
			move_uploaded_file($file['tmp_name'], $savepath);
			
			$filedata = array('filename' => $file['name'], 'filepath'=>$savepath, 'filetype'=>$file['type']);
			return $filedata;
		} else {
			return '';
		}
	}
}