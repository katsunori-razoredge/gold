<?php

class SailingShip extends AppModel {

//MUTE	public $useTable = false;

	public $primaryKey = 'sailing_ship_id';

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
		$memento = $this->find('all', Array('conditions' => Array('sailing_ship_id' => $id )));
		$reply = '[{';
		$reply .= '"' . 'resource' . '"' . ': ' . '"' . $memento[0]['SailingShip']['resource'] . '"' . ',';
		$reply .= '"' . 'id' . '"' . ': ' . $memento[0]['SailingShip']['sailing_ship_id'] . ',';
		$reply .= '"' . 'name' . '"' . ': ' . '"' . $memento[0]['SailingShip']['name'] . '"' . ',';
		$reply .= '"' . 'json' . '"' . ': ' . $memento[0]['SailingShip']['json'];
		$reply .= '}]';
		echo $reply;
		exit;
	}
	
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
