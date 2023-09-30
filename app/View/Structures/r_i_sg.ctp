<link rel="stylesheet" href="https://razor-edge.net/cakephp-2.4.4/bootstrap-4.3.1-dist/css/bootstrap.min.css"></link>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://razor-edge.net/cakephp-2.4.4/js/popper.min.js"></script>
<script src="https://razor-edge.net/cakephp-2.4.4/bootstrap-4.3.1-dist/js/bootstrap.bundle.js"></script>

<h3>id: 5e9a1a84a0bc24d22a75d1a8</h3>
<h3>name: RunnerInStratingGate</h3>
<h3>casts:</h3>
<ul>
    <li>runner</li>
    <li>startingGate</li>
</ul>
<h3>implement(s):</h3>
<ul>
    <li>Warter Balloon</li>
</ul>
<h3>dcof:</h3>
<select id="">
    <option>And</option>
    <option>Aql</option>
</select>
<br />
<br />
<div id="" style="border: 1px solid black;">
    <div class="btn-group dropright">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            throb
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#"></a>
        </div>
    </div>
    <br />
    <br />
</div>
<br />
<br />
<h3>dcoel:</h3>
<select id="select_for_era">
    <option>And</option>
    <option>Aql</option>
</select>
<br />
<br />
<div id="view_for_era" style="border: 1px solid black;">
    <div class="btn-group dropright">
        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            . gets broken
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">.runner.splashes</a>
            <a class="dropdown-item" href="#">.startingGate.swirls</a>
            <a class="dropdown-item" href="#">. all.leave from there</a>
        </div>
    </div>
    <br />
    <br />
    <div class="btn-group dropright">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            . gets pressed
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">. yields</a>
        </div>
    </div>
</div>

<script>
    
    window.onload = (e) => {
        let select = document.getElementById("select_for_era");
        select.addEventListener("change", (e) => {
            console.log(e.target.options[e.target.selectedIndex].value);
            let view = document.getElementById("view_for_era");
            
            switch (e.target.options[e.target.selectedIndex].value) {
            case "And":
                view.innerHTML = `
                    <div class="btn-group dropright">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            . gets broken
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">.runner.splashes</a>
                            <a class="dropdown-item" href="#">.startingGate.swirls</a>
                            <a class="dropdown-item" href="#">. all.leave from there</a>
                        </div>
                    </div>
                    <br />
                    <br />
                    <div class="btn-group dropright">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            . gets pressed
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">. yields</a>
                        </div>
                    </div>
                `;
                break;
            case "Aql":
                view.innerHTML = `
        <div class="btn-group dropright">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                . gets pressed
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">. yields</a>
            </div>
        </div>
                `;
                break;
            }
        });
        
        select.dispatchEvent(new CustomEvent("change", {detail: {}}));
    }
    
</script>