<?php
	class SportListController extends AppController {
		public $layout = 'SportDesigner';
		public function index() {
			$this->set('sports', array(
				'0'=>'公演', 
				'1'=>'主催', 
				'2'=>'立ち上げ', 
				'3'=>'ToPlay role',
				'4'=>'2,000万円詐取',
				'5'=>'ゲリラ戦',
				'6'=>'庇う 匿う 逃がす',
				'7'=>'働く with 通学',
				'8'=>'捕り物',
				'9'=>'牛刀持ち出し',
				'10'=>'ToExtinguish',
				'11'=>'ToLaunder ネコ',
				'12'=>'ToExecute (service|treatment|script)',
				'13'=>'To出演 AV',
				'14'=>'製作 映画やゲームソフト',
				'15'=>'接待',
			)
			);
		}
	}
?>