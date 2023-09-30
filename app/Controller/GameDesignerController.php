<?php
    class GameDesignerController extends AppController {
        public function index() {
			$this->layout = false;
			$this->render('index');
		}
    }
?>
