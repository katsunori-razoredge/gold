<?php

App::uses('RzModelInterface', 'Lib');

class CapsuleForMySql extends AppModel implements RzModelInterface {
//	public $useTable = 'capsules';
	public $primaryKey = 'capsule_id';

	public function fetchPage($page, $limit, $offset) {
		return $this->find('all', Array('page' => $page, 'limit' => $limit, 'offset' => $offset));
	}
}
?>
