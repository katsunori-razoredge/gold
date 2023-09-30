<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php echo $this->Html->css('razoredge_1_5'); ?>
        <?php echo $this->Html->css('bootstrap.min'); ?>
        <?php echo $this->Html->script('disc_system'); ?>
        <?php echo $this->Html->script('magazine'); ?>
        <?php echo $this->Html->script('disc_2020'); ?>
        <?php echo $this->Html->script('historian'); ?>
        <?php echo $this->Html->script('sail'); ?>
        <?php echo $this->Html->script('metal_tape'); ?>
        <?php echo $this->Html->script('cube'); ?>	</head>
	<body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        <br />
        eat
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <div id="root"></div>
        <script>
            let rootDiv = document.getElementById("root");
            let discSystem;
            let unit = 30;
            window.onload = (e) => {
                discSystem = new DiscSystem({rootDiv: rootDiv});

                let show_1 = function() {

                    let solvent, solute;
                    solvent = document.createElement("div");
                    solvent.draggable = true;
                    solvent.ondragend = (e) => {
                        let x, y;
                        x = 0;
                        y = 0;
                        solvent.style.top = e.pageY - y + "px";
                        console.log(solvent.previousLeft);
                        console.log(e.pageX);
                        solvent.style.left =  Math.abs(e.pageX - solvent.previousLeft) + "px";
                    }
                    solvent.ondragenter = (e) => {
//                    solvent.onstartdrag = (e) => {
                        solvent.previousLeft = e.pageX;
                    };
                    solvent.style = "top: 600px; left: 0px; background-color: rgba(0, 0, 0, 0.5); width: 900px; height: 300px; z-index: 10000; position: absolute;";
                    solute = document.createElement("button");
                    solute.innerHTML = "×";
                    solvent.appendChild(solute);
                    rootDiv.appendChild(solvent);
                    discSystem.setLoupe(solvent);

                    let sail;
                    let unit4Disc = 160;
                    sail = new Sail({rootDiv: discSystem.getBottom(), captionForFront: "eat", height: "150px", width: "160px"});
                    sail.jointDiv.style.transform += "translateZ(1px)";
                    
                    let disc;
                    disc = new Disc({rootDiv: discSystem.getBottom(), innerHTMLForFrontInner: `
                        mesh("it in mouth")
                    `});
                    disc.frontInnerDiv.addEventListener("click", (e) => {discSystem.getLoupe().innerHTML = e.target.innerHTML;});
                    disc.moveY(0);
                    disc.moveX(0);
                    
                    disc = new Disc({rootDiv: discSystem.getBottom(), innerHTMLForFrontInner: `
                        chew
                    `});
                    disc.frontInnerDiv.addEventListener("click", (e) => {discSystem.getLoupe().innerHTML = e.target.innerHTML;});
                    disc.moveY(unit * 1);
                    disc.moveX(10);
                    
                    disc = new Disc({rootDiv: discSystem.getBottom(), innerHTMLForFrontInner: `
                        swallow
                    `});
                    disc.frontInnerDiv.addEventListener("click", (e) => {discSystem.getLoupe().innerHTML = e.target.innerHTML;});
                    disc.moveY(unit * 2);
                    disc.moveX(10);
                    
                    
                    
                    let historian;
                    let innerHTML = `
                        chew able
                    `;
                    historian = new Historian({rootDiv: discSystem.getBottom(), dur: (unit * 1) + "px", innerHTML});
                    historian.moveX(unit4Disc * 1.1);
                    
                    innerHTML = `
                        swallow able
                    `;
                    historian = new Historian({rootDiv: discSystem.getBottom(), dur: (unit * 1) + "px", innerHTML});
                    historian.moveY(unit * 1);
                    historian.moveX(unit4Disc * 1.1);
                    
                    
                    
return;

                    let x = 250;
                    let cube;
                    cube = new Cube({rootDiv: discSystem.getBottom()}); cube.moveX(0);  cube.moveY(0);  cube.moveZ(0);
                    cube = new Cube({rootDiv: discSystem.getBottom()}); cube.moveX(0);  cube.moveY(unit * 1);  cube.moveZ(0);
                    cube = new Cube({rootDiv: discSystem.getBottom()}); cube.moveX(0);  cube.moveY(unit * 2);  cube.moveZ(unit * 1);
                    cube = new Cube({rootDiv: discSystem.getBottom()}); cube.moveX(0);  cube.moveY(unit * 3);  cube.moveZ(unit * 1);
                    cube = new Cube({rootDiv: discSystem.getBottom()}); cube.moveX(0);  cube.moveY(unit * 4);  cube.moveZ(unit * 1);
                    cube = new Cube({rootDiv: discSystem.getBottom()}); cube.moveX(0);  cube.moveY(unit * 5);  cube.moveZ(unit * 1);
                    cube = new Cube({rootDiv: discSystem.getBottom()}); cube.moveX(0);  cube.moveY(unit * 6);  cube.moveZ(unit * 1);
                    cube = new Cube({rootDiv: discSystem.getBottom()}); cube.moveX(0);  cube.moveY(unit * 7);  cube.moveZ(unit * 1);
                    cube = new Cube({rootDiv: discSystem.getBottom()}); cube.moveX(0);  cube.moveY(unit * 8);  cube.moveZ(unit * 0.5);
                    cube = new Cube({rootDiv: discSystem.getBottom()}); cube.moveX(0);  cube.moveY(unit * 9);  cube.moveZ(unit * 1.5);

                    // pipelines
                    disc = new Disc({rootDiv: discSystem.getBottom(), innerHTMLForFrontInner: `
                        <font color="blue">繚: </font>dcoml.rx << currentGame<br />
                        <font color="blue">縫: </font>lotVendor.rx << currentGame<br />
                        <font color="blue">纈: </font>sc.rx << hf.rx << currentGame<br />
                        <font color="blue">絲: </font>ijp.rx << currentGame<br />
                    `});
                    
                    disc.frontInnerDiv.addEventListener("click", (e) => {
                        console.log(e.target);
                        discSystem.getLoupe().innerHTML = e.target.innerHTML;
                    });
                    disc.moveX(unit4Disc * 1);

                    // dcoml
                    disc = new Disc({rootDiv: discSystem.getBottom(), innerHTMLForFrontInner: `
                        blank
                    `});
                    disc.frontInnerDiv.addEventListener("click", (e) => {discSystem.getLoupe().innerHTML = e.target.innerHTML;});
                    disc.moveX(unit4Disc * 2);
                    disc.moveY(5);

                    disc = new Disc({rootDiv: discSystem.getBottom(), innerHTMLForFrontInner: `
                        <font color="green">漲</font><sup><font color="red">流</font></sup>, <font color="red">濺</font>
                    `});
                    disc.frontInnerDiv.addEventListener("click", (e) => {discSystem.getLoupe().innerHTML = e.target.innerHTML;});
                    disc.moveX(unit4Disc * 2);
                    disc.moveY(300);

                    // lotVendor
                    disc = new Disc({rootDiv: discSystem.getBottom(), innerHTMLForFrontInner: `
                        <ul>
                            <li>PK</li>
                            <li>FK</li>
                        </ul>
                    `});
                    disc.frontInnerDiv.addEventListener("click", (e) => {discSystem.getLoupe().innerHTML = e.target.innerHTML;});
                    disc.moveX(unit4Disc * 3);
                    disc.moveY(200);

                    disc = new Disc({rootDiv: discSystem.getBottom(), innerHTMLForFrontInner: `
                        <ul>
                            <li>War</li>
                        </ul>
                    `});
                    disc.frontInnerDiv.addEventListener("click", (e) => {discSystem.getLoupe().innerHTML = e.target.innerHTML;});
                    disc.moveX(unit4Disc * 3);
                    disc.moveY(260);

                    // curentGame
                    disc = new Disc({rootDiv: discSystem.getBottom(), innerHTMLForFrontInner: `
                        <div class="bd-example">
                          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="1231erogif_0073.gif" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5>First slide label</h5>
                                  <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img src="js/0007.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5>Second slide label</h5>
                                  <p style="color: red;">池: 薊, {α: (e) => {}, }</p>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img src="js/0009_s.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5>Third slide label</h5>
                                  <p style="color: black;">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                </div>
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                        </div>
                    `});
                    disc.frontInnerDiv.addEventListener("click", (e) => {discSystem.getLoupe().innerHTML = e.target.innerHTML;});
                    disc.moveX(unit4Disc * 5);
                    disc.moveY(200);
                };
                
                const inflate = () => {
//                    discSystem.terrain.style.transform += "rotateZ(180deg) rotateX(-45deg) translateX(1000px)"; // from prehistory
                    discSystem.terrain.style.transform += "rotateX(45deg)";
                };
                
                show_1();
                inflate();


            }
        </script>
    </body>
</html>
