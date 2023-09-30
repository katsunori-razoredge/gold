<?php

App::uses('DoListUseCase', 'Lib/UseCase/Capsule');

class CapsulesController extends AppController {
	public $layout = 'SportDesigner';
	public function index() {
		$doIt_1 = function() {
			$this->loadModel('Capsule');
			var_dump($this->Capsule->find("5d0c13759015e16de0b80767"));	exit;
		};
	}
	
	/**
	 * 
	 * 
	 * @param dest 'mysql'
	 */
	public function doList() {
		$this->autoLayout = false;
		
		$useCase = new DoListUseCase($_GET['dest']);
		$memento = $useCase->execute($_GET['page'], $_GET['limit']);
		
		$this->set('aggregate', json_encode($memento));
		$this->render('list');
		return;
	}
}

?>
