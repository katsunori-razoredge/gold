<?php

class SportDisc extends AppModel {

	public $useTable = false;

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

	/**
	 *
	 */
	public function find($sportId = null, $type = null, $query = null) {
		$reply = array();
		$mongoCursor = null;
		$this->mongo = new Mongo();
		$this->database = $this->mongo->selectDB('razoredge');
		$this->collection = $this->database->selectCollection('sport_discs');
		if ($sportId != null) {
			$mongoCursor = $this->collection->find(array('sport_id' => $sportId));
			$mongoCursor->sort(array('order_in_ti' => 1, 'greek' => 1));
		} else {
			$mongoCursor = $this->collection->find();
		}
		foreach ($mongoCursor as $document) {
			if (array_key_exists('is_address', $document)) $document['isAddress'] = true;
			array_push($reply, $document);
		}
		return $reply;
	}

	public function findEx() {
		$reply = array();
		$mongoCursor = null;
		$this->mongo = new Mongo();
		$this->database = $this->mongo->selectDB('razoredge');
		$this->collection = $this->database->selectCollection('sport_discs');
		if ($sportId != null) {
			$mongoCursor = $this->collection->find(array('_id' => new MongoID($sportId)));
		} else {
			$mongoCursor = $this->collection->find();
		}
		foreach ($mongoCursor as $document) {
			array_push($reply, $document);
		}
		return $reply;
	}

	public function analyze($discs) {
		$reply = ['max_era' => 0, 'max_greek' => 0];
		foreach ($discs as $disc) {
			if ($reply['max_era'] < $disc['order_in_ti']) $reply['max_era'] = $disc['order_in_ti'];
			if ($reply['max_greek'] < $disc['greek']) $reply['max_greek'] = $disc['greek'];
		}

		return $reply;
	}
}
?>
