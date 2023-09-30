<?php
App::uses('AppController', 'Controller');

class MetaController extends AppController {
	public function beforeFilter() {
		$this->Auth->allow('index');
	}

	public function index() {
		$this->autoLayout = false;
		
		$user = $this->Auth->user('id');
		(is_null($user)) ? $status = 404 : $status = 200;
		$reply = [
		  "status" => $status,
		  "user" => $user
		];

		header("Content-type: text/html; charset=utf-8");
		echo json_encode($reply, JSON_UNESCAPED_UNICODE);
		exit();
	}
}
?>
