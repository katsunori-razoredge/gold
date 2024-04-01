<?php
App::uses('RzModelInterface', 'Lib');

class Bump extends AppModel implements RzModelInterface {
	public $useTable = false;
	public $primaryKey = 'bump_id';

	public function fetchPage($page, $limit, $offset) {
	  $files = [
	    [
	      'fileName' => "bumps_00000100.csv",
	      'category' => ''
	    ],
	    [
	      'fileName' => "bumps_00000200.csv",
	      'category' => 'application'
	    ],
	    [
	      'fileName' => "bumps_00000300.csv",
	      'category' => 'application'
	    ]
    ];
    
		$memento = [];
		$counter = 1;
//		array_map(function($v) use ($reply, $round, $counter) {}, $files)
    for ($i = 0; $i <= count($files) - 1; $i++) {
  	  $path = '/var/razoredge_labo/database/' . $files[$i]['fileName'];
//  	  $path = WWW_ROOT . 'files' . DS . $files[$i]['fileName'];
  	  $fileHandle = fopen($path, 'r');
	  
  	  while (($record = fgetcsv($fileHandle)) !== false) {
  	    $bump = [
  	      'id' => 'csv-' . str_pad($counter, 8, '0', STR_PAD_LEFT),
  	      'category' => $files[$i]['category'],
  	      'data' => explode("\t", $record[0])
        ];
  			array_push($memento, $bump);
  			$counter++;
  	  }
  	  fclose($fileHandle);
		};
		
		$reply = array_slice($memento, ($page - 1) * 100, 100);
		return $reply;
	}

	public function giveCount($conditions = null) {
		$memento = $this->find('count', Array('conditions' => $conditions));
		$reply = '{';
		$reply .= '"' . 'count' . '"' . ': ' . '"' . $memento . '"';
		$reply .= '}';
		echo $reply;
		exit;
	}

	public function findById($id = null, $type = null, $query = null) {
		$holder = $this->find('all', [ 'conditions' => array('bump_id' => $id) ]);
//		var_dump($holder); exit();
		$reply = array();
		array_push($reply, [
			'id' => $id,
			'name' => $holder[0]['BumpForMySql']['name'],
			'json' => $holder[0]['BumpForMySql']['json'],
			'lineup' => [],
			'html' => $holder[0]['BumpForMySql']['html'],
			'sailing_ship_id' => $holder[0]['BumpForMySql']['sailing_ship_id']
		]);
		return $reply;
	}
}
?>
