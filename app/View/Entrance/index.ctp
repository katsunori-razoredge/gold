<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-AMS_CHTML"></script>
        <?php echo $this->Html->script('downloader'); ?>
        <?php echo $this->Html->css('razoredge'); ?>
    </head>
    <body>
        <div id="root">
            <div><button id="game_designer">game_designer</button></div>
            <div><button id="sport_designer">sport_designer</button></div>
            <div><button id="ofar_designer">ofar_designer</button></div>
            <div><button id="structures">structures</button></div>
            <div><button id="diachronic_structures">diachronic_structures</button></div>
            <div><button id="capsules">capsules</button></div>
            <div><button id="form">form</button></div>
        	<div class="button">design sport</div>
        	<br />
        	<div class="button">design game</div>
        	<div>
        	    Builder Patternは，[director, builder, product]というcastの洗い出しに功績は認められる．だが，Productは宣言型言語で記述されるべし．<br />
        	    幾つかの要件毎にtime codeに貫かれたleaf through ableを先頭から終端まで走査しつつ要件(s)を馴染ませるという作業を繰り返す作業によって，Productは獲られる．<br />
        	    <nobr class="tooltip">director.constructを蒐集する事業<span class="tooltiptext tooltip-bottom">ConstructListener構想</span></nobr>に，恐らく，意味はない．
        	</div>
        	<br />
        	<br />
        	
        </div>
        <div class="function">
            <pre>
/**
 * flower >>= applyStr({str: PtF, p: bloom})
 * @param flower 図形
 * @example 点の軌跡によって図形を描画する
 */</pre>
        drawByArpeggio = (flower) => {}
        </div>
        <br />
        <br />

        <script>
            let rootDiv = document.getElementById("root");
            window.onload = (e) => {
                let solvent, solute;

                let controller;
                document.getElementById("game_designer").addEventListener("click", (e) => {   location.href = "/gold/game_designer/index"});
                document.getElementById("sport_designer").addEventListener("click", (e) => {   location.href = "/gold/sport_designer/index"});
                document.getElementById("ofar_designer").addEventListener("click", (e) => {   location.href = "/gold/og/index"});
                document.getElementById("capsules").addEventListener("click", (e) => {   location.href = "/gold/capsules/index"});
                document.getElementById("form").addEventListener("click", (e) => {   location.href = "/gold/articles/index?id=form"});
                
                controller = "structures";
                document.getElementById(controller).addEventListener("click", (e) => {   console.log(controller); location.href = "/gold/" + controller + "/index";    });
                controller = "diachronic_structures";
                document.getElementById(controller).addEventListener("click", (e) => {   location.href = "/gold/" + controller + "/index";    });

                solvent = rootDiv;

                solute = document.createElement("button");  solvent.appendChild(solute);
                solute.innerHTML = "sport";
                solute.addEventListener("click", (e) => {   location.href = "/gold/sports/doList"});
                
                solute = document.createElement("button");  solvent.appendChild(solute);
                solute.innerHTML = "sport";
                solute.addEventListener("click", (e) => {   location.href = "/gold/sports/showDetail"});

                solute = document.createElement("button");  solvent.appendChild(solute);
                solute.innerHTML = "capsule";
                solute.addEventListener("click", (e) => {   location.href = "/gold/capsules/doList"});

                solute = document.createElement("button");  solvent.appendChild(solute);
                solute.innerHTML = "hand";
                solute.addEventListener("click", (e) => {   location.href = "/gold/hands/doList"});
                
            }
        </script>
    </body>
</html>
