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
		$this->set('title_for_layout', 'Alisha.ccmos.tw');
	}
	
	public function index() {
		$this->set('userData', $this->Auth->user());
		$this->set('loggedIn', $this->Auth->loggedIn());
	}
	
}
