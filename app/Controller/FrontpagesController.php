<?php
App::uses('AppController', 'Controller');
/**
 * Frontpages Controller
 *
 */
class FrontpagesController extends AppController {
	public $uses = array();
	
	function beforeFilter() {
		parent::beforeFilter();
		
		$this->Auth->allow('index');
		$this->set('title_for_layout', '課程網頁');
	}
	
	public function index() {
		
	}
	
}
