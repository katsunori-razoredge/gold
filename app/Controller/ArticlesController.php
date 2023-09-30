<?php
	class ArticlesController extends AppController {
		public $layout = 'SportDesigner';
		public function index() {
			$id = $this->request->query('id');
			$this->render($id);
		}
		
		public function doList() {
			$this->autoLayout = false;

			$this->loadModel('Capsule');
			$aggregate = $this->Capsule->find();

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

		public function insert() {

			$this->loadModel('Www2w');


			$document = array(
				'name' => $_POST['name'],
				'ingredient' => $_POST['ingredient'],
				'summary' => $_POST['summary'],
				'subject' => $_POST['subject'],
				'their states' => $_POST['their_states'],
				'provoker' => $_POST['provoker'],
				'object' => $_POST['object'],
				'verb' => $_POST['verb'],
			);


/*
			$document = array(
				'ingredient' => '',
				'subject' => '二遊',
				'what they doing' => '一塁にランナー',
				'provoker' => 'ヒット性の打球'
			);
*/
			$this->Www2w->execute($document);


			$this->setAction('index');
//			$this->render('index.ctp');
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

		public function design() {
			$this->autoLayout = false;
			$this->render('design');
		}
	}
?>
