<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php echo $this->Html->script('downloader'); ?>
        <?php echo $this->Html->script('sport_editor'); ?>
        <?php echo $this->Html->script('indicator'); ?>
        <?php echo $this->Html->css('razoredge'); ?>
    </head>
    <body>
        <div id="rewritable">
        </div>
<!--
        <div>
            name: <input id="name" type="text" name="sport_name">
            <br />
            id: <div id="name" name="sport_id"></div>
            <br />
            <div id="tag_area">
                <input id="append" type="button" value="+">
            </div>
            <input id="trigger" type="button" value="update">
        </div>
-->
        <script>
            let rootDiv = document.getElementById("rewritable");
            let tagArea = document.getElementById("tag_area");
            let trigger = document.getElementById("trigger");
            let editor = new SportEditor(rootDiv);
            let downloader = new Downloader("https://razor-edge.net/cakephp-2.4.4/sports/find", null, ". gets SportModel", editor.groundDiv, "id=<?php echo $sportId; ?>");

            window.onload = function(e) {

                editor.addEventListener(". gets SportModel", (e) => {
                    console.log(e);
                    editor.setIngredients(e.detail);
                });


                var loadBinaryImage = function(path, cb, type) {
        		  var xhr = new XMLHttpRequest();
        		  xhr.onreadystatechange = function(){
        		    if (this.readyState == 4 && this.status == 200) {
        				var img = document.getElementById("img_1");
        			    var url = window.URL || window.webkitURL;
        			    img.src = url.createObjectURL(this.response);
        //		      cb(this.response);
        		    }
        		  }
        		  xhr.open('GET', path);
        		  xhr.responseType = 'blob';
        //		  xhr.responseType = type || 'blob';
        		  xhr.send();
        		}

        		loadBinaryImage("https://razor-edge.net/cakephp-2.4.4/sport_designer/giveImage", null, null);

//                new TagIndicator("{id: 'name'}", rootDiv);

/*
                trigger.addEventListener("click", (e) => {

                    let form = document.createElement("form");
                    rootDiv.appendChild(form);

//                    form.action = "https://razor-edge.net/cakephp-2.4.4/sports/executeUpdating";
//                    form.method = "post";

                    editor.appendInputs(form);

//                    input = document.createElement("input");
//                    input.type = "hidden";
//                    input.name = "data[Sport][tags][]";
//                    input.value = "ToCoordinate";
////                    input.value = "(面積|体積)";
//                    form.appendChild(input);

//                    form.submit();
                });
*/
                downloader.execute();
            }
        </script>
    </body>
</html>
