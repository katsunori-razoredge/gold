<?php

class Matrix extends AppModel {

//MUTE	public $useTable = false;

	public $primaryKey = 'matrix_id';

	protected $mongo;

	protected $database;

	protected $collection;

	protected $problem;

/*
	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
	}
*/
	public function execute($document) {
	}
	
	public function findById($id = null, $type = null, $query = null) {
		$memento = $this->find('all', Array('conditions' => Array('matrix_id' => $id )));
		$reply = '[{';
		$reply .= '"' . 'resource' . '"' . ': ' . '"' . $memento[0]['Matrix']['resource'] . '"' . ',';
		$reply .= '"' . 'id' . '"' . ': ' . $memento[0]['Matrix']['matrix_id'] . ',';
		$reply .= '"' . 'name' . '"' . ': ' . '"' . $memento[0]['Matrix']['name'] . '"' . ',';
		$reply .= '"' . 'json' . '"' . ': ' . $memento[0]['Matrix']['json'];
		$reply .= '}]';
		echo $reply;
		exit;
	}
	
	public function doList($page, $limit, $offset) {
		$memento = $this->find('all', Array('page' => $page, 'limit' => $limit, 'offset' => $offset));
/*		
		$reply = '[';
		for ($i = 0; $i <= count($memento) - 1; $i++) {
			if (1 <= $i) $reply .= ', ';
			$reply .= '{';
			$reply .= '"' . 'resource' . '"' . ': ' . '"' . $memento[$i]['Matrix']['resource'] . '"' . ',';
			$reply .= '"' . 'id' . '"' . ': ' . $memento[$i]['Matrix']['matrix_id'] . ',';
			$reply .= '"' . 'name' . '"' . ': ' . '"' . $memento[$i]['Matrix']['name'] . '"' . ',';
			$reply .= '"' . 'json' . '"' . ': ' . $memento[$i]['Matrix']['json'];
			$reply .= '}';
		}		
		$reply .= ']';
		echo $reply;
		exit;
*/
		return $memento;
	}

	public function giveCount($conditions = null) {
		$memento = $this->find('count', Array('conditions' => $conditions));
		$reply = '{';
		$reply .= '"' . 'count' . '"' . ': ' . '"' . $memento . '"';
		$reply .= '}';
		echo $reply;
		exit;
	}
}	
?>
