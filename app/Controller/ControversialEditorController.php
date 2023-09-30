<?php
	class ControversialEditorController extends AppController {
		public $layout = 'SportDesigner';
		public function index() {
/*		
			App::import('Model','ConnectionManager');
			$db = ConnectionManager::getDataSource('default');
			$query = 'insert into rt_author_vs_audiences (content) values (' . "'" . "役満" . "'" . ')';
			$result = $db->query($query);
			print_r($result);
			exit();
*/
		}
		
		public function doList() {
			$this->loadModel('Www2w');
			$aggregate = $this->Www2w->find();
			$this->set('aggregate', $aggregate);
			
			$this->render('list');
		}
		
		public function insert() {
			
			print_r($_POST);
			exit();
			
			$this->loadModel('Controversial');
			
			
			$document = array(
				'peculiar_id' => $_POST['peculiar_id'],
				'provoker_id' => $_POST['provoker_id']
			);
			
			
			$this->Controversial->execute($document);
		}
	}
?>