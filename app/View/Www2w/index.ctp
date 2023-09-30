<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<?php echo $this->Html->script('downloader'); ?>
	</head>
	<body>
		<script>
			var downloader;
			//
			window.onload = function() {
				downloader = new Downloader('https://razor-edge.net/cakephp-2.4.4/www2w/find', null, null, null);
				downloader.execute();
			}
		</script>
	</body>
</html>