<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php echo $this->Html->css('razoredge'); ?>
    </head>
	<body>
		<div id="root"></div>

		<script>
			let aggregate = <?php echo $aggregate; ?>;
			let root = document.getElementById("root");
			
			window.onload = (e) => {
				console.log(aggregate);
		
				aggregate.map((value) => {
					let div = document.createElement("div");
					div.style = "margin: 1px 1px; height: 1.5rem; border: 1px solid black;";
					div.innerHTML = value.name;
					root.appendChild(div);
				});
			}
		</script>
	</body>
</html>
