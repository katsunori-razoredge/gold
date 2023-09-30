<?php
	class SportDesignerController extends AppController {
		public $layout = 'SportDesigner';
		public function index() {
			$page = $this->request->query("page");
//			$this->layout = false;

			do {
				if ($page == NULL) {
					$this->render("index");
					break;
				}

				if ($page == "mix_pif") {
					$this->set("contents", 'contents');
					$this->render("index_01001000");
					break;
				}

			} while (0);

		}

		public function giveImage() {
			$mime_type = "image/jpeg";
			$file_path = "/var/razoredge_package/_entrance/20191231.PNG";
			readfile($file_path);
			exit;
		}

		public function show() {
			$this->layout = false;
			$this->render('show');
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
			$this->loadModel('Www2w');
			$aggregate = $this->Www2w->find();

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


		public function find() {
			$this->loadModel('Www2w');
			$aggregate = $this->Www2w->find();

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
//			$memento = json_encode($memento, JSON_UNESCAPED_UNICODE);

			header("Content-type: text/html; charset=utf-8");
			$this->viewClass = 'Json';
			$this->set(compact('memento'));
			$this->set('_serialize', 'memento');
		}








	}
?>
