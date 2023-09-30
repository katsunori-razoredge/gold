class Magazine {

    /**
     * @param width
     * @param innerHTML
     * @param bottomColor
     */
    constructor(lop) {
        this.rootDiv = lop.rootDiv; this.spineDiv = null;   this.jointDiv = null;   this.bottomDiv = null;  this.discs = []; this.isSpineDivStanding = false;

        let elem;
        elem = document.createElement("div");

        let width = "200px";
        if ("width" in lop) width = lop.width;
        if (("bottomColor" in lop) == false) lop.bottomColor = "rgba(0, 0, 255, 0.9)";
        elem.style = "transform-style: preserve-3d; width: " + width + "; height: 30px; background-color:" + lop.bottomColor + "; position: absolute; top: 0px; left: 0px; z-index: 1000;";
//        elem.style = "transform-style: preserve-3d; border: 1px solid blue; width: " + width + "; height: 30px; background-color:" + lop.bottomColor + "; position: absolute; top: 0px; left: 0px; z-index: 1000;";
        this.bottomDiv = elem;

        elem = document.createElement("div");
        elem.style = "border: 1px solid red; transform-style: preserve-3d; position: relative;";
//        elem.style = "transfrom-style: preserve-3d; perspective: 800px; border: 1px solid red;";
        this.jointDiv = elem;

        elem = document.createElement("div");
//                   "perspective: 400px; perspective-origin: 50% 100px;"
        elem.style = "transform-style: preserve-3d; height: 100px; background-color: rgba(100, 100, 100, 0.1); width: " + width + "; height: 100px; position: absolute; top: 0px; left: 0px; z-index: 1100;";
        if ("duration" in lop) elem.style.height = lop.duration + "px";

        ("innerHTML" in lop) ? elem.innerHTML = lop.innerHTML : elem.innerHTML = "　";
        elem.addEventListener("dblclick", (function(e) {
            console.log(e.target);
//            this.jointDiv.style.transition = "1S";
            if (this.isSpineDivStanding) {
                this.jointDiv.style.transform = "rotateX(0deg)";
                this.isSpineDivStanding = false;
            } else {
                this.jointDiv.style.transform = "rotateX(90deg)";
                this.isSpineDivStanding = true;
            }
//            this.bottomDiv.style.transform += "rotateZ(180deg)";
        }).bind(this));
        this.spineDiv = elem;

        this.jointDiv.appendChild(this.spineDiv);
        this.bottomDiv.appendChild(this.jointDiv);
        this.rootDiv.appendChild(this.bottomDiv);

    }

    registerDisc(lop) {
        let elem;

        lop.rootDiv = this.spineDiv;
        elem = new Disc(lop);
        elem.moveY(lop.top);
//        this.spineDiv.appendChild(elem);
        return elem;
    }

    inflate() {
        this.jointDiv.style.transform = "rotateX(90deg)";   this.isSpineDivStanding = true;
    }

    moveY(value) {

        this.bottomDiv.style.top = (parseInt(this.bottomDiv.style.top) + value) + "px";
//        this.jointDiv.style.top = (parseInt(this.jointDiv.style.top) + value) + "px";
//        this.spineDiv.style.top = (parseInt(this.spineDiv.style.top) + value) + "px";

    }

    moveX(value) {
        this.bottomDiv.style.left = (parseInt(this.bottomDiv.style.left) + value) + "px";
    }
}
