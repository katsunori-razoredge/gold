<?php
	class BottlesController extends AppController {
		public $layout = 'SportDesigner';
		public function index() {
		}

		public function doIt() {

			$this->loadModel('SportDisc');
			$aggregate = $this->SportDisc->find("5e1a3eeecb76a336195c6fd4", null, null);
var_dump($aggregate); exit;
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

/*
			$this->loadModel('Tag');
			$aggregate = $this->Tag->find("5d169883953ab850737e47b8");

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
*/
			header("Content-type: text/html; charset=utf-8");
			echo json_encode($memento, JSON_UNESCAPED_UNICODE);
			exit();
		}

		public function doList() {
			$this->autoLayout = false;

			$this->loadModel('Sport');
			$aggregate = $this->Sport->find();

			$this->loadModel('RecordsTag');
			$this->loadModel('Tag');
			$this->loadModel('Structure');
			foreach ($aggregate as &$value) {
$id = $value['_id']->{'$id'};
				$tags = $this->RecordsTag->find('sports', (string)$value['_id']);
//				$tags = $this->RecordsTag->find('all', array('conditions' => array('local__id' => $id))); // MySQL
				if ($tags != null) {
					$listOfTag = array();
					foreach ($tags as &$v2) {

						$tag = $this->Tag->find($v2['tag_id']);
/*
						try {
							$invoker = null;
							if ($v2['tag_name'] == 'sports') {
								$invoker = $this->Sport;
							} else if ($v2['tag_name'] == 'structure') {
								$invoker = $this->Structure;
							}
							if ($invoker == null) throw new Exception();
							$tag = $invoker->find($v2['tag_id']);
						} catch (Exception $e) {
							CakeLog::write('debug', 'Tag model has problem: ' . $v2['_id']->{'$id'});
							$tag = $this->Tag->find($v2['tag_id']);
						}
*/

//						$tag = $this->Tag->find('first', array('conditions' => array('id' => $v2['RecordsTag']['tag_id']))); // MySQL
//						array_push($listOfTag, $tag['Tag']['name']); // MySQL

						if (1 <= count($tag)) {
							array_push($listOfTag, $tag[0]['name']);
						} else {
							CakeLog::write('debug', 'Tag model has problem: ' . $v2['_id']->{'$id'});
						}
					}
					$value['tags'] = implode(", ", $listOfTag);
				}
				$value['_id'] = $id;

//				($tags != null) ? $value['tags'] = json_encode($tags, JSON_UNESCAPED_UNICODE) : $value['tags'] = null;
			}
/* TODO: remove mute after finished cleaning sports
			$sort = array();
			foreach ((array) $aggregate as $key => $value) {
				if (in_array('name', $value, true)) {
					CakeLog::write('debug', 'Sport model does not have name property: ' . $value['_id']);
				} else {
					CakeLog::write('debug', 'Sport model does not ...: ' . $value['_id']);
				}

				$sort[$key] = $value['name'];
			}
			array_multisort($sort, SORT_ASC, SORT_STRING|SORT_FLAG_CASE, $aggregate);
*/
			$this->set('aggregate', $aggregate);
			$this->render('list');
		}


		public function doListByTag() {
			$this->autoLayout = false;

			$this->loadModel('Sport');
			$aggregate = $this->Sport->find();

			$this->loadModel('RecordsTag');
			$this->loadModel('Tag');
			$this->loadModel('Structure');

			$tagName = $this->request->data("tag");
			$tagName = $this->request->query("tag");
			$tagId = $this->Tag->findByName($tagName);
			$aggregate = $this->RecordsTag->findFromTag('sports', $tagId[0]['_id']->{'$id'});

			$memento = [];
			foreach ($aggregate as &$value) {

				$sport = $this->Sport->find($value['local_id'])[0];
				$sport['_id'] = $sport['_id']->{'$id'};
				$tags = $this->RecordsTag->find('sports', $sport['_id']);
				if ($tags != null) {
					$listOfTag = array();
					foreach ($tags as &$v2) {
						$tag = $this->Tag->find($v2['tag_id']);
						if (1 <= count($tag)) {
							array_push($listOfTag, $tag[0]['name']);
						} else {
//							CakeLog::write('debug', 'Tag model has problem: ' . $v2['_id']->{'$id'});
						}
					}
					$sport['tags'] = implode(", ", $listOfTag);
					array_push($memento, $sport);
				}

//				($tags != null) ? $value['tags'] = json_encode($tags, JSON_UNESCAPED_UNICODE) : $value['tags'] = null;
			}
			$this->set('aggregate', $memento);
			$this->render('list');
		}

		/**
		 * I to return JSON.
		 * 
		 * TODO: {bottle_id, name, index_number, body}を返却するqueryの結果をJSON形式で返却する
		 */
		public function find() {
			$grandId = $this->request->data("id");
			$grandId = $this->request->query("id");
			$this->loadModel('Bottle');
			$aggregate = $this->Bottle->findById($grandId);
			echo json_encode($aggregate, JSON_UNESCAPED_UNICODE);
			exit();
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
			$this->loadModel('Bottle');
			// for MySQL
			$aggregate = $this->Bottle->find('all', [
				'limit' => 10,
				'page' => $this->request->query("page")
			]);
			// for Mongo
//			$aggregate = $this->Sport->find();

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
		
		public function showDetail() {
			
			$this->autoLayout = false;
			$name = $this->request->query('name');
			($name) ? $this->render('/Sports/table/' . $name) : $this->render('list_for_table');

		}

		public function findEx() {
			$this->loadModel('Sport');
			$aggregate = $this->Sport->findEx();

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

		public function drawEditor() {
			$this->set('sportId', $this->request->query('id'));
			$this->render('editor');
		}

		/**
		 * [Sport][tags][0]="mind"
		 */
		public function executeUpdating() {
			// array(2) { ["id"]=> string(24) "5d107553e860973d548fc910" ["tags"]=> array(2) { [0]=> string(4) "tagA" [1]=> string(4) "tagB" } }
			$sportId = $this->request->data('Sport')['id'];
			// array(2) { [0]=> string(4) "tagA" [1]=> string(4) "tagB" }
			$newListOfTag = $this->request->data('Sport')['tags'];

			$this->loadModel('Tag');
			$this->loadModel('RecordsTag');

			$newListOfTagId = array();
			foreach ($newListOfTag as $value) {
				$tag = null;
				$tag = $this->Tag->findByName($value);
				$tag = $tag[0];
//CakeLog::write('debug', $tag[0]['name']);
				array_push($newListOfTagId, array('id' => $tag['_id']->{'$id'}, 'name' => $tag['name']));
			}
			// array(2) { [0]=> array(2) { ["id"]=> string(24) "5dabd145baa7000b41159f35" ["name"]=> string(4) "mind" } [1]=> array(2) { ["id"]=> string(24) "5d195d2ee8aeda7c146c11d2" ["name"]=> string(7) "{par:5}" } }
			// var_dump($newListOfTagId);	exit;

			foreach ($newListOfTagId as $value) {
				$memento = $this->RecordsTag->findEx('sports', $sportId, $value['id']);
				if (1 <= count($memento)) {
					CakeLog::write('debug', $value['id'] . 'is exist already.');
				} else {
					$this->RecordsTag->insert('sports', $sportId, $value['id']);
				}
			}



/* for delete
			$memento = $this->RecordsTag->find('sports', $sportId);
			$oldListOfTag = array();
			foreach ($memento as $value) {    array_push($oldListOfTag, $value['tag_id']);    }
*/
			//


			try {

			} catch (Exception $e) {

			}
		}

		/**
		 * "minutely" doubles Adjective.
		 */
		public function giveMinutelySport() {
			$sportId = $this->request->data("id");
			$sportId = $this->request->query("id");
			$this->loadModel('Sport');
			$aggregate = $this->Sport->find($sportId);

			$this->loadModel('RecordsTag');
			$this->loadModel('Tag');
			$this->loadModel('Structure');
			$this->loadModel('SportDisc');

			foreach ($aggregate as &$value) {
$id = $value['_id']->{'$id'};

				$tags = $this->RecordsTag->find('sports', (string)$value['_id']);
//				$tags = $this->RecordsTag->find('all', array('conditions' => array('local__id' => $id))); // MySQL
				if ($tags != null) {
					$listOfTag = array();
					foreach ($tags as &$v2) {
						$tag = $this->Tag->find($v2['tag_id']);

						if (1 <= count($tag)) {
							array_push($listOfTag, $tag[0]['name']);
						} else {
							CakeLog::write('debug', 'Tag model has problem: ' . $v2['_id']->{'$id'});
						}
					}
					$value['tags'] = implode(", ", $listOfTag);
				}

				$value['_id'] = $id;
				$listOfDiscs = array();

				$discs = $this->SportDisc->find($sportId);
				$listOfTDiscs = array();
				$value['lu'] = $this->SportDisc->find($sportId);
				$value['lu_profile'] = $this->SportDisc->analyze($discs);

//				($tags != null) ? $value['tags'] = json_encode($tags, JSON_UNESCAPED_UNICODE) : $value['tags'] = null;
			}
/*
			header("Content-type: text/html; charset=utf-8");
			echo json_encode($aggregate, JSON_UNESCAPED_UNICODE);
			exit();
*/
			return $aggregate;
		}

		/**
		 *
		 */
		public function drawMinutely() {
			$this->autoLayout = false;

			$aggregate = $this->giveMinutelySport();

			$this->set('aggregate', $aggregate);
			$this->render('ship');
		}

	}
?>
