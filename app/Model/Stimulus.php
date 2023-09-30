<?php

class Stimulus extends AppModel {
	
	public $useTable = false;
	
	protected $mongo;
	
	protected $database;
	
	protected $collection;

	public function execute($document) {
	}
	
	public function find($id = null, $type = null, $query = null) {
		$reply = array();
		$mongoCursor = null;
		$this->mongo = new Mongo();
		$this->database = $this->mongo->selectDB('razoredge');
		$this->collection = $this->database->selectCollection('stimuli');
		if ($id != null) {
			$mongoCursor = $this->collection->find(array('_id' => new MongoID($id)));
		} else {
			$mongoCursor = $this->collection->find();
		}
		foreach ($mongoCursor as $document) {
			array_push($reply, $document);
		}
		return $reply;
	}
}
?>
