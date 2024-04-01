<?php
App::uses('RzModelInterface', 'Lib');

class BumpForMySql extends AppModel implements RzModelInterface {
	public $useTable = 'bumps';
	public $primaryKey = 'bump_id';

	public function fetchPage($page, $limit, $offset) {
//		return $this->find('all', Array('page' => $page, 'limit' => $limit, 'offset' => $offset));
		$aggregate = $this->find('all', [
				'page' => $page,
				'limit' => $limit,
				'offset' => $offset
			]
		);

		$reply = [];
		foreach ($aggregate as &$value) {
			array_push($reply, $value['BumpForMySql']);
		}
		return $reply;
	}

	public function giveCount($conditions = null) {
		$memento = $this->find('count', Array('conditions' => $conditions));
		$reply = '{';
		$reply .= '"' . 'count' . '"' . ': ' . '"' . $memento . '"';
		$reply .= '}';
		echo $reply;
		exit;
	}

	public function findById($id = null, $type = null, $query = null) {
		$holder = $this->find('all', [ 'conditions' => array('bump_id' => $id) ]);
//		var_dump($holder); exit();
		$reply = array();
		array_push($reply, [
			'id' => $id,
			'name' => $holder[0]['BumpForMySql']['name'],
			'json' => $holder[0]['BumpForMySql']['json'],
			'lineup' => [],
			'html' => $holder[0]['BumpForMySql']['html'],
			'sailing_ship_id' => $holder[0]['BumpForMySql']['sailing_ship_id']
		]);
		return $reply;
	}
}
?>
