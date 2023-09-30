<?php
	class ProvokerController extends AppController {
		public $layout = 'SportDesigner';
		public function index() {
		}
		
		public function doList() {
			$this->loadModel('Www2w');
			$aggregate = $this->Www2w->find();
			$this->set('aggregate', $aggregate);
			
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
			$this->loadModel('Provoker');
			$aggregate = $this->Provoker->find();
			
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