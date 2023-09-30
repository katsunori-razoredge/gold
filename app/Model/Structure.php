<?php

class Structure extends AppModel {
	
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
	
	public function find($id = null, $type = null, $query = null) {
		$reply = array();
		$mongoCursor = null;
		$this->mongo = new Mongo();
		$this->database = $this->mongo->selectDB('razoredge');
		$this->collection = $this->database->selectCollection('structures');
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
	
	public function findEx() {
		$reply = array();
		$mongoCursor = null;
		$this->mongo = new Mongo();
		$this->database = $this->mongo->selectDB('razoredge');
		$this->collection = $this->database->selectCollection('sport');

		try {
/*		
			$mongoCursor = $this->collection->aggregate([
				['$addFields' => [
					"tag_id" => [
						'$toObjectId' => '$tag_id'
					]
				]],
				['$lookup' => [
					"from" => "tags",
					"localField" => "tag_id",
					"foreignField" => "_id",
					"as" => "tags"
				]]
			]);
*/			
		} catch (Exception $e) {
			echo $e->getMessage();	exit;
		}
var_dump($mongoCursor);
exit;		
	
		foreach ($mongoCursor as $document) {
			array_push($reply, $document);
		}
		
		return $reply;
		
	}
}
?>
