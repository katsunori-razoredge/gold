<?php

//ini_set("display_erros", 'Off');
//error_reporting(E_ALL);

App::uses('AppController', 'Controller');

class TagsController extends AppController {
	public function link() {
		$this->loadModel('Tag');
		$this->Tag->linkResourceAndTag($_GET['tagged_id'], $_GET['resource'], $_GET['tag_id']);
		header("Content-type: text/html; charset=utf-8");
		exit();
	}

/*
	public function find() {
		$this->loadModel('Tag');
		$collection = $this->Tag->find('all');
//		$collection = json_encode($collection, JSON_UNESCAPED_UNICODE);
//		$this->autoRender = false;
//		$this->autoLayout = false;
//		$this->response->type('json');

//$this->viewClass = 'Json';
//$this->set(compact('collection'));
//$this->set('_serialize', 'collection');

			header("Content-type: text/html; charset=utf-8");
			$this->viewClass = 'Json';
			$this->set(compact('collection'));
			$this->set('_serialize', 'collection');

	}
*/
		public function find() {
			$this->loadModel('Tag');
			$aggregate = $this->Tag->find();

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

//var_dump($memento); exit;
			foreach ((array) $memento as $key => $value) {
			    $sort[$key] = $value['name'];
			}
			array_multisort($sort, SORT_ASC, SORT_STRING|SORT_FLAG_CASE, $memento);

			header("Content-type: text/html; charset=utf-8");
			echo json_encode($memento, JSON_UNESCAPED_UNICODE);
			exit();
		}

		public function doList() {
// did copy and paste begin
			$this->autoLayout = false;
			$this->loadModel('Tag');
			$aggregate = $this->Tag->find();

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

//var_dump($memento); exit;
			foreach ((array) $memento as $key => $value) {
			    $sort[$key] = $value['name'];
			}
			array_multisort($sort, SORT_ASC, SORT_STRING|SORT_FLAG_CASE, $memento);
// did copy and paste end
			$this->set('aggregate', $memento);
			$this->render('list');
		}
}
?>
