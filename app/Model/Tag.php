<?php
class Tag extends AppModel {
/*
	public $validate = array(
		'username' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'A username is required'
			)
		),
		'password' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'A password is required'
			)
		)
	);
*/

	public function giveJsonableString($data) {
		try {
			$reply = '[';
			for ($i = 0; $i <= count($data) - 1; $i++) {
				if (1 <= $i) $reply .= ', ';
				$reply .= '{';
				$reply .= '"' . 'value' . '"' . ': ' . '"' . $data[$i]['tags']['value'] . '"' . ',';
				$reply .= '"' . 'id' . '"' . ': ' . $data[$i]['tags']['id'];
				$reply .= '}';
			}
			$reply .= ']';
			return $reply;
		} catch (Exception $e) {
			var_dump($e);
		}
	}
	
	/**
	 *
	 */
	public function fetchListByResourceId($resource, $id) {
		try {
			return $this->query("SELECT tags.id, tags.value FROM tags, tags_records tr WHERE tr.tag_id = tags.id AND tr.table_name = '$resource' AND tr.record_id = $id;");
		} catch (Exception $e) {
			var_dump($e);
		}
	}
	
	public function linkResourceAndTag($taggedId, $resource, $tagId) {
		try {
			$this->query("INSERT INTO tags_records (record_id, table_name, tag_id) VALUES ($taggedId, '$resource', $tagId)");
		} catch (Exception $e) {
			var_dump($e);
		}
	}
	
	//----------------------------------------
	// For mongo
	//----------------------------------------

	public function find($tagId = null, $type = null, $query = null) {
		$reply = array();
		$mongoCursor = null;
		$this->mongo = new Mongo();
		$this->database = $this->mongo->selectDB('razoredge');
		$this->collection = $this->database->selectCollection('tags');

		if ($tagId == null) {
			$mongoCursor = $this->collection->find();
		} else {
			$mongoCursor = $this->collection->find(array('_id' => new MongoID($tagId)));
		}
		foreach ($mongoCursor as $document) {
			array_push($reply, $document);
		}
		return $reply;
	}

	public function findByName($name) {
		$reply = array();
		$mongoCursor = null;
		$this->mongo = new Mongo();
		$this->database = $this->mongo->selectDB('razoredge');
		$this->collection = $this->database->selectCollection('tags');

		$mongoCursor = $this->collection->find(array('name' => $name));

		foreach ($mongoCursor as $document) {
			array_push($reply, $document);
		}
		return $reply;
	}

}
?>
