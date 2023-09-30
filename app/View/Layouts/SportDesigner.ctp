<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<?php echo $this->fetch('script'); ?>
		<?php echo $this->Html->css('razoredge'); ?>
	</head>
	<body>
		<div id='header' style="background-color: silver; color: white;">
			RazorEdge
		</div>
		<br />
		<div id='content'>
			<?=$content_for_layout; ?>
		</div>
		<br />
		<div id='footer'>Copyright (C) 2020 RazorEdge. All rights reserved.</div>
	</body>
</html>
