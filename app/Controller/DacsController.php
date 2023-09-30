<?php
	class DacsController extends AppController {
		public $layout = 'SportDesigner';

		public function index() {
		}
		
		public function findById() {
			$this->autoLayout = false;

			$this->loadModel('DanceAndChoreographer');
			$this->loadModel('Tag');
			
			$dacs = $this->DanceAndChoreographer->findById($_GET['id']);
			$reply = '[{';
			$reply .= '"' . 'id' . '"' . ': ' . $dacs[0]['DanceAndChoreographer']['sport_bottle_id'] . ', ';
			$reply .= '"' . 'sport_id' . '"' . ': ' . '"' . $dacs[0]['DanceAndChoreographer']['sport_id'] . '"';
			$reply .= '"' . 'bottle_id' . '"' . ': ' . '"' . $dacs[0]['DanceAndChoreographer']['bottle_id'] . '"';
			
			$reply .= '"' . 'tags' . '"' . ': ';
			$reply .= $this->Tag->giveJsonableString($this->Tag->fetchListByResourceId('sports_bottles', $_GET['id']));

			$reply .= '}]';
			echo $reply;
			exit();
		}

		public function doList() {
		  $this->loadModel('DanceAndChoreographer');
		  $this->loadModel('Tag');
		  $this->loadModel('Sport');
		  $this->loadModel('Bottle');
		  $dacs = $this->DanceAndChoreographer->doList($_GET['page'], $_GET['limit'], $_GET['offset']);
		  
			$reply = '[';
			
			for ($i = 0; $i <= count($dacs) - 1; $i++) {
				if (1 <= $i) $reply .= ', ';
				$reply .= '{';
				$reply .= '"' . 'id' . '"' . ': ' . $dacs[$i]['DanceAndChoreographer']['sport_bottle_id'] . ', ';
				
				$reply .= '"' . 'sport' . '"' . ': ';
				$sport = $this->Sport->findById($dacs[$i]['DanceAndChoreographer']['sport_id']);
				$reply .= "{ ";
				$reply .= '"' . 'sport_id' . '"' . ": " . $sport[0]['Sport']['sport_id'] . ", ";
				$reply .= '"' . 'name' . '"' . ": " . '"' . $sport[0]['Sport']['name'] . '", ';
			  
			  $reply .= '"' . 'tags' . '"' . ": ";
			  $tags = $this->Tag->fetchListByResourceId('sports', $sport[0]['Sport']['sport_id']);
			  $reply .= $this->Tag->giveJsonableString($tags);

				$reply .= " }";
				$reply .= ', ';


				$reply .= '"' . 'bottle' . '"' . ': ';
				$bottle = $this->Bottle->findById($dacs[$i]['DanceAndChoreographer']['bottle_id']);
				$reply .= "{ ";
				$reply .= '"' . 'bottle_id' . '"' . ": " . $bottle[0]['id'] . ", ";
				$reply .= '"' . 'name' . '"' . ": " . '"' . $bottle[0]['name'] . '", ';

			  $reply .= '"' . 'tags' . '"' . ": ";
			  $tags = $this->Tag->fetchListByResourceId('sports', $bottle[0]['id']);
			  $reply .= $this->Tag->giveJsonableString($tags);

				$reply .= " }";
				$reply .= ', ';

				$reply .= '"' . 'tags' . '"' . ': ';
			  $tags = $this->Tag->fetchListByResourceId('sports_bottles', $dacs[$i]['DanceAndChoreographer']['sport_bottle_id']);
				$reply .= $this->Tag->giveJsonableString($tags);
				
				$reply .= '}';
			}
			
			$reply .= ']';
			echo $reply;
			exit;
		}

		public function giveCount() {
		  $this->loadModel('DanceAndChoreographer');
		  $this->DanceAndChoreographer->giveCount(null);
		}
	}
?>