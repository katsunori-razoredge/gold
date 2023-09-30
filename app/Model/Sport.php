<?php

class Sport extends AppModel {

//MUTE	public $useTable = false;

	public $primaryKey = 'sport_id';

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
	
	public function findById($id) {
		return $this->find('all', Array('conditions' => Array('sport_id' => $id )));
	}
	
/*MUTE
	public function find($sportId = null, $type = null, $query = null) {
		$reply = array();
		$mongoCursor = null;
		$this->mongo = new Mongo();
		$this->database = $this->mongo->selectDB('razoredge');
		$this->collection = $this->database->selectCollection('sports');
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
*/
	public function findEx() {
		$reply = array();
		$mongoCursor = null;
		$this->mongo = new Mongo();
		$this->database = $this->mongo->selectDB('razoredge');
		$this->collection = $this->database->selectCollection('sports');

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
