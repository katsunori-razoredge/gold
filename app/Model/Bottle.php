<?php

class Bottle extends AppModel {
//MUTE	public $useTable = false;

	public $primaryKey = 'bottle_id';

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
		$holder = $this->find('all', ['conditions' => array('Bottle.bottle_id' => $id)]);
		$query = "select b.bottle_id, b.name, bd.index_number, bd.body from bottles b left join bottle_details bd on b.bottle_id = bd.bottle_id where b.bottle_id = " . $id . " order by bd.index_number;";
		$rawDetails = $this->query($query);
//var_dump($holder);	exit();
		
		$details = array();
		foreach ($rawDetails as $detail) {
//var_dump($detail["bd"]);	exit();
			if ($detail["bd"]["index_number"] === null && $detail["bd"]["body"] === null ) {
//MUTE				$details = null;
//MUTE				break;
			}

			array_push(
				$details,
				[
					"index_number" => $detail["bd"]["index_number"],
					"body" => $detail["bd"]["body"]
				]
			);
		}

		$reply = array();
		array_push($reply, [
			"id" => $id,
			"name" => $holder[0]["Bottle"]["name"],
			"body" => $holder[0]["Bottle"]["body"],
			"lineup" => $details
		]);
		return $reply;
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
