<?php

class Choreography extends AppModel {
	
	public $useTable = false;
	
	protected $mongo;
	
	protected $database;
	
	protected $collection;
/*	
	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
	}
*/	
	public function execute($document) {
		$this->mongo = new Mongo();
		$this->database = $this->mongo->selectDB('razoredge');
		$this->collection = $this->database->selectCollection('www2w');
		$this->collection->insert($document);
	}
	
	public function find($type = null, $query = null) {
		$reply = array();
		$mongoCursor = null;
		$this->mongo = new Mongo();
		$this->database = $this->mongo->selectDB('razoredge');
		$this->collection = $this->database->selectCollection('choreography');
		$mongoCursor = $this->collection->find();
		foreach ($mongoCursor as $document) {
			array_push($reply, $document);
		}
		return $reply;
	}
}
?>
