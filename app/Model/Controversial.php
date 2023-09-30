<?php

class Www2w extends AppModel {
	
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
		App::import('Model','ConnectionManager');
		$db = ConnectionManager::getDataSource('default');
		$query = 'insert into peculiar_and_provoker (peculiar_id, provoker_id) values (' . "'" . $document['peculiar_id'] . "', " . "'" . $document['provoker_id'] . "'" . ')';
		$result = $db->query($query);
	}
	
	public function find($type = null, $query = null) {
		$reply = array();
		
		$mongoCursor = null;
		$this->mongo = new Mongo();
		$this->database = $this->mongo->selectDB('razoredge');
		$this->collection = $this->database->selectCollection('www2w');
		$mongoCursor = $this->collection->find();
		foreach ($mongoCursor as $document) {
			array_push($reply, $document);
		}
		
		return $reply;
	}
}
?>
