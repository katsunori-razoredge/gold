<?php
	class StimuliController extends AppController {
		public $layout = 'SportDesigner';
		public function index() {
			$this->loadModel('Capsule');
			var_dump($this->Capsule->find("5d0c13759015e16de0b80767"));	exit;
		}
		
		public function doList() {
			$this->autoLayout = false;
			
			$this->loadModel('Stimulus');
			$aggregate = $this->Stimulus->find();
			$this->loadModel('RecordsTag');
			
			foreach ($aggregate as &$value) {
				$id = $value['_id'];
				$value['_id'] = $id;
			}
			$this->set('aggregate', json_encode($aggregate));
			$this->render('list');
		}
		
		public function doListByJson() {
			$this->loadModel('Stimulus');
			$aggregate = $this->Stimulus->find();
			
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