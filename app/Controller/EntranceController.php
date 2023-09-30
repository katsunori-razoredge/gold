<?php
    class EntranceController extends AppController {
        
        public function index() {
			$this->layout = false;
            if (isset($this->request->query['context']) && $this->request->query['context'] === 'class') {
    			$this->render('class');
            } else {
    			$this->render('index');
            }
		}
    }
?>
