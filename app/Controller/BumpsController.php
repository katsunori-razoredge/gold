<?php
App::uses('BumpUseCase', 'Lib/UseCase');
App::uses('SailingShipUseCase', 'Lib/useCase');

class BumpsController extends AppController {
	public $layout = 'SportDesigner';

	public function index() {
	}
	
	public function findById() {
		$useCase = new BumpUseCase('mysql');
		$memento = $useCase->findById($_GET['id']);
		
		if (!is_null($memento[0]["sailing_ship_id"])) {
			$useCaseForSailingShip = new SailingShipUseCase('mysql');
			$sailingShips = $useCaseForSailingShip->findById($memento[0]['sailing_ship_id']);
			$memento[0]['json'] = $sailingShips[0]['json'];
		}

		echo json_encode($memento, JSON_UNESCAPED_UNICODE);
		exit();
	}
	
	public function doListByJson() {
		$dest = (isset($_GET['dest'])) ? $_GET['dest']  : 'mysql'; 
		$useCase = new BumpUseCase($dest);
		$memento = $useCase->fetchPage($_GET['page'], (isset($_GET['limit'])) ? $_GET['limit'] : 10);
		echo json_encode($memento, JSON_UNESCAPED_UNICODE);
		exit();
	}

	public function doList() {
		$dest = (isset($_GET['dest'])) ? $_GET['dest']  : 'mysql'; 
		$useCase = new BumpUseCase($dest);
		
		$memento = $useCase->fetchPage($_GET['page'], 10);
		echo json_encode($memento, JSON_UNESCAPED_UNICODE);
		exit();
	}

	public function giveCount() {
//	  $this->loadModel('DanceAndChoreographer');
//	  $this->DanceAndChoreographer->giveCount(null);
	}
	
	public function save() {
		$useCase = new BumpUseCase('mysql');
		
		$repo = 'BumpForMySql';

		$bo = [$repo => []];
		if ($this->request->data('id') && !(strcmp($this->request->data('id'), '-1') == 0)) $bo[$repo]['bump_id'] = $this->request->data('id');
		$bo[$repo]['name'] = $this->request->data('name');
		$bo[$repo]['json'] = $this->request->data('json');
		$bo[$repo]['html'] = $this->request->data('html');
		$lastInsertId = $useCase->save($bo);
		echo json_encode(['id' => $lastInsertId], JSON_UNESCAPED_UNICODE);
		exit();
	}
}
?>