<?php
class RecordsTag extends AppModel {
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

	//----------------------------------------
	// For mongo
	//----------------------------------------

	public function find($recordName = null, $sportId = null, $type = null, $query = null) {
		$reply = array();
		$mongoCursor = null;
		$this->mongo = new Mongo();
		$this->database = $this->mongo->selectDB('razoredge');
		$this->collection = $this->database->selectCollection('records_tags');
		$mongoCursor = $this->collection->find(array('record_name' => $recordName, 'local_id' => $sportId));
		foreach ($mongoCursor as $document) {
			array_push($reply, $document);
		}
		return $reply;
	}

	public function findEx($recordName = null, $sportId = null, $tagId = null) {
		$reply = array();
		$mongoCursor = null;
		$this->mongo = new Mongo();
		$this->database = $this->mongo->selectDB('razoredge');
		$this->collection = $this->database->selectCollection('records_tags');
		$mongoCursor = $this->collection->find(array('record_name' => $recordName, 'local_id' => $sportId, 'tag_id' => $tagId));
		foreach ($mongoCursor as $document) {
			array_push($reply, $document);
		}
		return $reply;
	}

	public function findFromTag($recordName = null, $tagId = null) {
		$reply = array();
		$mongoCursor = null;
		$this->mongo = new Mongo();
		$this->database = $this->mongo->selectDB('razoredge');
		$this->collection = $this->database->selectCollection('records_tags');
		$mongoCursor = $this->collection->find(array('record_name' => $recordName, 'tag_id' => $tagId));
		foreach ($mongoCursor as $document) {
			array_push($reply, $document);
		}
		return $reply;
	}

	public function insert($recordName = null, $localId = null, $tagId = null) {
		$reply = array();
		$mongoCursor = null;
		$this->mongo = new Mongo();
		$this->database = $this->mongo->selectDB('razoredge');
		$this->collection = $this->database->selectCollection('records_tags');
		$this->collection->insert(array('record_name' => $recordName, 'local_id' => $localId, 'tag_id' => $tagId));
//		$mongoCursor = $this->collection->find(array('record_name' => $recordName, 'local_id' => $sportId));
//		return $reply;
	}



}
?>
