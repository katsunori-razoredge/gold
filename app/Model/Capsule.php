<?php
App::uses('RzModelInterface', 'Lib');

class Capsule extends AppModel implements RzModelInterface {
	
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
	
	public function find($id = null, $type = null, $query = null) {
		$reply = array();
		$mongoCursor = null;
		$this->mongo = new Mongo();
		$this->database = $this->mongo->selectDB('razoredge');
		$this->collection = $this->database->selectCollection('capsule');
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

	public function fetchPage($page, $limit, $offset) {
		$reply = array();
		$mongoCursor = null;
		$this->mongo = new Mongo();
		$this->database = $this->mongo->selectDB('razoredge');
		$this->collection = $this->database->selectCollection('capsule');
		$id = null;
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
