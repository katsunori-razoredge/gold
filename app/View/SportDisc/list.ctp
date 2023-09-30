<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php echo $this->Html->script('downloader'); ?>
        <?php echo $this->Html->css('razoredge'); ?>
    </head>
	<body>
<!--
		<?php foreach ($aggregate as $token): ?>
			<?php echo '<li>' . var_dump($token) . '</li>'; ?>
		<?php endforeach; ?>
-->
		<div id="root"></div>


		<script>
			let aggregate = JSON.parse('<?php $m = json_encode($aggregate); echo $m; ?>');
			let root = document.getElementById("root");
			window.onload = (e) => {
				aggregate.map((value) => {
					let sport = null;
					let tags = null;
					if (value.c) sport = value.c;
					if (value.ingredient) sport = value.ingredient;
					if (value.name) sport = value.name;
					if (value.tags) tags = value.tags;

					if (sport) {
						let div = document.createElement("div");
						div.style.clear = "both";
						root.appendChild(div);

						let div4Sport = document.createElement("div");
						div.appendChild(div4Sport);
						div4Sport.style.width = "500px";
						div4Sport.style.float = "left";
                        div4Sport.innerHTML = sport + ", " + value._id;
//                        div4Sport.innerHTML = sport;

						let div4Tags = document.createElement("div");
						div4Tags.style.border = "1px solid red";
						div.appendChild(div4Tags);
						div4Tags.innerHTML = tags;
					}
				});
			}
		</script>
	</body>
</html>
