<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php echo $this->Html->script('disc'); ?>
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

        <div id="virtual_canvas" style="perspective: 400px; perspective-origin: 50% 100px;"></div>
        <div id="sub_window_1">
            sailing ship
        </div>


		<script>
			let aggregate = JSON.parse('<?php $m = json_encode($aggregate); echo $m; ?>')[0];
			let root = document.getElementById("root");

            let canvas = document.getElementById("virtual_canvas");
            let discMediator = new DiscMediator({owner: canvas});

			window.onload = (e) => {
                discMediator.setOwner(canvas);

                discMediator.createThenAppend({owner: canvas, id: aggregate.name, tc: 0, greek: "btwn_tc_α", isSkewer: true, bottom: {t: "1000"}, content: aggregate.name});

                aggregate.lu_profile;
                let lu = aggregate.lu;

                let greek = "alpha";
                lu.map((value) => {

                    switch (value.order_in_ti) {
                    case 0:
                        break;
                    case 1:
                        break;
                    }

                    switch (value.greek) {
                    case 0:
                        greek = "alpha";
                        break;
                    case 1:
                        greek = "beta";
                        break;
                    }

                    if (value.is_second_half) {
                        discMediator.createThenAppend({owner: canvas, id: value.value, isFront: false, isBottom: false, isRight: true, tc: 1, greek: greek, isSecondHalf: true, content: value.value});
                    } else {
                        if ('is_address' in value == false) {
                            discMediator.createThenAppend({owner: canvas, id: value.value, tc: value.order_in_ti, greek: greek, content: value.value});
                        } else {
                            discMediator.createThenAppend({owner: canvas, id: value.value, tc: value.order_in_ti, greek: greek, content: value.value, isAddress: true, isBottom: false});
                        }
                    }


                });






                discMediator.rotate();

			}
		</script>
	</body>
</html>
