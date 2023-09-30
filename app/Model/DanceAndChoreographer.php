<?php

class DanceAndChoreographer extends AppModel {

//MUTE	public $useTable = false;

	public $useTable = 'sports_bottles';

	public $primaryKey = 'sport_bottle_id';

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
		try {
			return $this->find('all', Array('conditions' => Array('sport_bottle_id' => $id )));
		} catch (Exception $e) {
			var_dump($e);
		}
	}
	
	public function doList($page, $limit, $offset) {
		return $this->find('all', Array('page' => $page + 1, 'limit' => $limit));
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
