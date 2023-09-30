<?php
	class MatricesController extends AppController {
		public $layout = 'SportDesigner';

		public function index() {
		}
		
		public function findById() {
			$this->autoLayout = false;

			$this->loadModel('Matrix');
			header("Content-type: text/html; charset=utf-8");
			$memento = $this->Matrix->findById($_GET['id']);
		}

		public function save() {
			$this->loadModel('Matrix');
			
			if (isset($_POST['id']) && $_POST['id'] != -1) {
				$bo = array(
					'Matrix' => Array(
						'matrices_id' => $_POST['id'],
						'name' => $_POST['name'],
						'json' => $_POST['json'],
						'resource' => $_POST['resource']
					)
				);
			} else {
				$bo = array(
					'Matrix' => Array(
						'name' => $_POST['name'],
						'json' => $_POST['json'],
						'resource' => $_POST['resource']
					)
				);
			}
			$this->Matrix->save($bo);

			header("Content-type: text/html; charset=utf-8");
			echo json_encode($bo, JSON_UNESCAPED_UNICODE);
//			echo json_encode($memento, JSON_UNESCAPED_UNICODE);
			exit();
		}

		public function update() {
			$this->loadModel('Matrix');
			$bo = array(
				'matrix_id' => $_POST['id'],
				'json' => $_POST['json']
			);
			$memento = $this->Matrix->update($bo);

			header("Content-type: text/html; charset=utf-8");
			echo json_encode($memento, JSON_UNESCAPED_UNICODE);
			exit();
		}
		
		public function doListByJson() {
		  $this->loadModel('Matrix');
		  $this->loadModel('Tag');
		  $matrices = $this->Matrix->doList($_GET['page'], $_GET['limit'], $_GET['offset']);
			$reply = '[';
			for ($i = 0; $i <= count($matrices) - 1; $i++) {
			  $tags = $this->Tag->fetchListByResourceId('matrices', $matrices[$i]['Matrix']['matrix_id']);
			  
				if (1 <= $i) $reply .= ', ';
				$reply .= '{';
				$reply .= '"' . 'resource' . '"' . ': ' . '"' . $matrices[$i]['Matrix']['resource'] . '"' . ',';
				$reply .= '"' . 'id' . '"' . ': ' . $matrices[$i]['Matrix']['matrix_id'] . ',';
				$reply .= '"' . 'name' . '"' . ': ' . '"' . $matrices[$i]['Matrix']['name'] . '"' . ',';
				$reply .= '"' . 'json' . '"' . ': ' . $matrices[$i]['Matrix']['json'] . ',';
				
				$reply .= '"' . 'tags' . '"' . ': ' . '[';
	
				for ($j = 0; $j <= count($tags) - 1; $j++) {
					if (1 <= $j) $reply .= ', ';
					$reply .= '{';
					$reply .= '"' . 'value' . '"' . ': ' . '"' . $tags[$j]['tags']['value'] . '"' . ',';
					$reply .= '"' . 'id' . '"' . ': ' . $tags[$j]['tags']['id'];
					$reply .= '}';
				}
				
				$reply .= ']';

				$reply .= '}';
			}		
			$reply .= ']';
			echo $reply;
			exit;
		}

		public function giveCount() {
		  $this->loadModel('Matrix');
		  $this->Matrix->giveCount(null);
		}
	}
?>