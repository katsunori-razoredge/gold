<?php
require_once("../../../RazorEdge/interface_of_visitor_dao.php");
	class DoDesignerController extends AppController {
		public $layout = 'SportDesigner';
		public function index() {
			$this->loadModel('ToAnalyzeModel');		
			$model = new ToAnalyzeModel();
			echo $model->execute();
			exit;

/*
			$dao = new InterfaceOfVisitorDAO();
			$dao->ignite("localhost", "razoredge", "razoredge", "Ad20100622");
			$memento = $dao->select();
			print_r($memento);
			exit;
*/
			$this->set('fifthVerbs', array('0'=>'(call | name)', '1'=>'make', '2'=>'keep', '3'=>'think', '4'=>'find', '5'=>'elect'));
		}
	}
?>
