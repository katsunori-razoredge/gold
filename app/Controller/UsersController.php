<?php

//ini_set("display_erros", 'Off');
//error_reporting(E_ALL);

App::uses('AppController', 'Controller');

class UsersController extends AppController {

//	public $autoLayout = false;
/*
	public $components = array(
		'Session',
		'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'passwordHasher' => array(
						'className' => 'None'
					)
				)
			),
//			'authorize' => array('Controller')
		)
	);
*/
	public function beforeFilter() {
		$this->Auth->allow('index', 'login');
	}

	public function index() {
		$this->autoLayout = false;
/*
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
*/
	}

	public function indexEx() {
	}

	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->findBy($id));
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect('/entrance/index');
			} else {
//				$this->redirect('https://razor-edge.net');
			}
		} else {
			$this->redirect('index');
		}
	}

	public function logout() {
		$this->Auth->logout();
	}

	public function add() {
		$this->loadModel('User');
//MUTE		$this->User->save(array('User' => array('username' => 'user', 'password' => 'password')));
	}

	public function decoy() {
	}



public function beforeSave($options = array()) {
    return true;
}




}
?>
