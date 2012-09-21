<?php
class FilesController extends AppController {
	public $uses = array('CourseFile');
	
	public function get_course_file($id) {
		$this->CourseFile->id = $id;
		$filedata = $this->CourseFile->read();
		
		header("Cache-Control: no-cache private");
		header("Content-Description: File Transfer");
		header('Content-disposition: attachment; filename=' . $filedata['CourseFile']['filename']);
		header("Content-Type: " . $filedata['CourseFile']['filetype']);
		header("Content-Transfer-Encoding: binary");
		
		readfile($filedata['CourseFile']['filepath']);
		
		exit;
	}
}