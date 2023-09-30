class Disc {

    /**
     * @param innerHTMLForFrontInner
     */
    constructor(lop) {
        this.bottom = null; this.front = null;
        let elem;
        let width, height;
        width = "160px";
        height = "90px";

        this.rootDiv = lop.rootDiv;

        elem = document.createElement("div");
        elem.style = "transform-style: preserve-3d; border: 1px solid blue; width: 200px; height: 30px; background-color: rgba(0, 0, 255, 0.5); position: absolute; top: 0px; left: 0px;";
        elem.style.width = width;
        if ("captionForBottom" in lop) elem.innerHTML = lop.captionForBottom;
        this.bottomDiv = elem;

        elem = document.createElement("div");
        elem.style = "transform-style: preserve-3d; border: 1px solid red; position: absolute; top: 0px; left: 0px;";
        let jointDiv = elem;


        elem = document.createElement("div");
        elem.style = "transform-style: preserve-3d; height: 100px; background-color: rgba(255, 0, 0, 0.1); width: 200px; height: 100px; position: absolute; top: 0px; left: 0px;";
        elem.style.width = width;
        elem.style.height = height;
        if ("captionForFront" in lop) elem.innerHTML = lop.captionForFront;
        elem.style.transform += "rotateZ(180deg)";
        elem.addEventListener("click", (function(e) {
            if (!this.frontDiv.isLifted || this.frontDiv.isLifted == false) {
                this.bottomDiv.style.transform += "translateZ(100px)";
                this.frontDiv.isLifted = true;
            } else {
                this.bottomDiv.style.transform += "translateZ(-100px)";
                this.frontDiv.isLifted = false;
            }
            return;
            if (!this.frontDiv.isLifted || this.frontDiv.isLifted == false) {
                this.frontDiv.style.transform += "translateY(-100px)";
                this.frontInnerDiv.style.transform += "translateY(-100px)";
                this.frontDiv.isLifted = true;
            } else {
                this.frontDiv.style.transform += "translateY(100px)";
                this.frontInnerDiv.style.transform += "translateY(100px)";
                this.frontDiv.isLifted = false;
            }
        }).bind(this));
        this.frontDiv = elem;

        elem = document.createElement("div");
        elem.className = "Disc FrontInner";
        elem.style.width = width;
        elem.style.height = height;
        elem.innerHTML = lop.innerHTMLForFrontInner;
        elem.style.transform += "rotateX(180deg)";
        elem.addEventListener("click", (function(e) {
        }).bind(this));
        this.frontInnerDiv = elem;


        jointDiv.appendChild(this.frontDiv);
        jointDiv.appendChild(this.frontInnerDiv);
        this.bottomDiv.appendChild(jointDiv);
//        this.rootDiv.appendChild(this.frontDiv);
        this.rootDiv.appendChild(this.bottomDiv);

        jointDiv.style.transform += "rotateX(90deg)";
//        jointDiv.style.transform += "rotateX(170deg)";
//        jointDiv.style.transform += "rotateY(180deg)";
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
