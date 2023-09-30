<?php
	class SailingShipsController extends AppController {
		public $layout = 'SportDesigner';

		public function index() {
		}
		
		public function findById() {
			$this->autoLayout = false;

			$this->loadModel('SailingShip');
			header("Content-type: text/html; charset=utf-8");
			$memento = $this->SailingShip->findById($_GET['id']);
		}
		
		public function doList() {
			$this->autoLayout = false;
			
			$this->loadModel('Hand');
			$aggregate = $this->Hand->find();
			
			$this->loadModel('RecordsTag');
			$this->loadModel('Tag');
			$this->loadModel('Sport');
			$this->loadModel('Structure');
			foreach ($aggregate as &$value) {
//var_dump($value['_id']);	var_dump($value['_id']->);	exit;
$id = $value['_id'];
				$tags = $this->RecordsTag->find('capsules', (string)$value['_id']);
//				$tags = $this->RecordsTag->find('all', array('conditions' => array('local__id' => $id))); // MySQL
				if ($tags != null) {
					$listOfTag = array();
					foreach ($tags as &$v2) {
						try {
							$invoker = null;
							if ($v2['tag_name'] == 'sports') {
								$invoker = $this->Sport;
							} else if ($v2['tag_name'] == 'structures') {
								$invoker = $this->Structure;
							} else if ($v2['tag_name'] == 'capsules') {
								$invoker = $this->Capsule;
							}
							
							if ($invoker == null) throw new Exception();
							$tag = $invoker->find($v2['tag_id']);
						} catch (Exception $e) {
							$tag = $this->Tag->find($v2['tag_id']);
						}
//						$tag = $this->Tag->find('first', array('conditions' => array('id' => $v2['RecordsTag']['tag_id']))); // MySQL
						try {
							if (isset($tag[0]['name']) == false) throw new Exception(); 
							array_push($listOfTag, $tag[0]['name']);
						} catch (Exception $e) {
							array_push($listOfTag, $tag['name']);
						}
//						array_push($listOfTag, $tag['Tag']['name']); // MySQL
					}
					$value['tags'] = implode(", ", $listOfTag);
				}
				$value['_id'] = $id;
				
//				($tags != null) ? $value['tags'] = json_encode($tags, JSON_UNESCAPED_UNICODE) : $value['tags'] = null;
			}
			$this->set('aggregate', json_encode($aggregate));
			$this->render('list');
		}
		
		public function save() {
			
			$this->loadModel('SailingShip');
			
			if (isset($_POST['id']) && $_POST['id'] != -1) {
				$bo = array(
					'SailingShip' => Array(
						'sailing_ship_id' => $_POST['id'],
						'name' => $_POST['name'],
						'json' => $_POST['json'],
						'resource' => $_POST['resource']
					)
				);
			} else {
				$bo = array(
					'SailingShip' => Array(
						'name' => $_POST['name'],
						'json' => $_POST['json'],
						'resource' => $_POST['resource']
					)
				);
			}
			$this->SailingShip->save($bo);

			header("Content-type: text/html; charset=utf-8");
			echo json_encode($bo, JSON_UNESCAPED_UNICODE);
//			echo json_encode($memento, JSON_UNESCAPED_UNICODE);
			exit();
			
		}

		public function update() {
			$this->loadModel('SailingShip');
			$bo = array(
				'sailing_ship_id' => $_POST['id'],
				'json' => $_POST['json']
			);
			$memento = $this->SailingShip->update($bo);

			header("Content-type: text/html; charset=utf-8");
			echo json_encode($memento, JSON_UNESCAPED_UNICODE);
			exit();
		}
		
		public function doListByJson() {
			$this->loadModel('Capsule');
			$aggregate = $this->Capsule->find();
			
			$memento = array();
			foreach ($aggregate as $token) {
				$tokenEx = array();
				foreach ($token as $key => $value) {
					if ("_id" == $key) {
						$tokenEx['_id'] = $value->{'$id'};
					} else {
						$tokenEx[$key] = $value;
					}
				}
				array_push($memento, $tokenEx);
			}
			
	
			header("Content-type: text/html; charset=utf-8");
			echo json_encode($memento, JSON_UNESCAPED_UNICODE);
			exit();
		}
	}
?>