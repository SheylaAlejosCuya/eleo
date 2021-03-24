<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment ten wide column">
        <h3>1. Selecciona con una flecha de qué material están forradas estas estatuas.</h3>
        <div class="ui vertical segment">
            <div id="arrowContainer" class="ui three column grid">
                
                <div class="row">
                    <div class="column">
                        <div onClick="setSelectedImage(this)" id="1" class="ui segment" style="text-align: center">Nos protege de la lluvia</div>
                    </div>
                    <div class="column"></div>
                    <div class="column">
                        <img onClick="setSelectedOption(this)" id="1" class="ui fluid image" src="{{asset('images/plastico.png')}}" alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <div onClick="setSelectedImage(this)" id="2" class="ui segment" style="text-align: center">Instrumentos para esquiar.</div>
                    </div>
                    <div class="column"></div>
                    <div class="column">
                        <img onClick="setSelectedOption(this)" id="2" class="ui fluid image" src="{{asset('images/plastico.png')}}" alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <div onClick="setSelectedImage(this)" id="3" class="ui segment" style="text-align: center">Instrumentos caminar por el campo.</div>
                    </div>
                    <div class="column"></div>
                    <div class="column">
                        <img onClick="setSelectedOption(this)" id="3" class="ui fluid image" src="{{asset('images/plastico.png')}}" alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <div onClick="setSelectedImage(this)" id="4" class="ui segment" style="text-align: center">Para protección personal cuando hacemos alpinismo.</div>
                    </div>
                    <div class="column"></div>
                    <div class="column">
                        <img onClick="setSelectedOption(this)" id="4" class="ui fluid image" src="{{asset('images/plastico.png')}}" alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <div onClick="setSelectedImage(this)" id="5" class="ui segment" style="text-align: center">Lo que nunca debe olvidarse para ir a la playa.</div>
                    </div>
                    <div class="column"></div>
                    <div class="column">
                        <img onClick="setSelectedOption(this)" id="5" class="ui fluid image" src="{{asset('images/plastico.png')}}" alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <div onClick="setSelectedImage(this)" id="6" class="ui segment" style="text-align: center">Para llevar nuestras cosas cuando salimos de paseo</div>
                    </div>
                    <div class="column"></div>
                    <div class="column">
                        <img onClick="setSelectedOption(this)" id="6" class="ui fluid image" src="{{asset('images/plastico.png')}}" alt="">
                    </div>
                </div>

                <div class="line" id="line1" style="background-color: black; position: absolute; height: 5px;"></div>
                <div class="line" id="line2" style="background-color: black; position: absolute; height: 5px;"></div>
                <div class="line" id="line3" style="background-color: black; position: absolute; height: 5px;"></div>
                <div class="line" id="line4" style="background-color: black; position: absolute; height: 5px;"></div>
                <div class="line" id="line5" style="background-color: black; position: absolute; height: 5px;"></div>
                <div class="line" id="line6" style="background-color: black; position: absolute; height: 5px;"></div>
            </div>
        </div>
    </div>
</div>
<script>
    let selectedImage = null;
    let selectedImageX = null;
    let selectedImageY = null;
    let selectedOptionX = null;
    let selectedOptionY = null;

    let lines = Array.from(document.getElementsByClassName("line"));
    
    console.log(lines)

    function deselect() {
        selectedImage = null;
        selectedImageX = null;
        selectedImageY = null;
        selectedOptionX = null;
        selectedOptionY = null;
    }

    let alreadyLinedImages = [];
    let alreadyLinedOptions = [];

    function setSelectedImage(element) {
        let edata = element.getBoundingClientRect();
        
        const arrowContainer = document.getElementById("arrowContainer");
        let c = arrowContainer.getBoundingClientRect();

        selectedImageX = edata.left - c.left - 16 + edata.width;
        selectedImageY = edata.top - c.top + edata.height/2;
        
        if (alreadyLinedImages.includes(element.id)) {
            element.style.border = "";
            deselect();
            return
        }

        if (selectedImage) {
            if (selectedImage.id === element.id) {
                element.style.border = "";
                deselect();
            } else {
                selectedImage.style.border = "";
                selectedImage = element;
                element.style.border = "5px solid green";
            }
        } else {
            selectedImage = element;
            element.style.border = "5px solid green";
        }
    }

    function setSelectedOption(element) {
        let edata = element.getBoundingClientRect();
        const arrowContainer = document.getElementById("arrowContainer");
        let c = arrowContainer.getBoundingClientRect();

        selectedOptionX = edata.left - c.left - 16;
        selectedOptionY = edata.top - c.top + edata.height/2;
        
        if (!selectedImage) {
            return
        }

        if (alreadyLinedOptions.includes(element.id)) {
            selectedImage.style.border = "";
            deselect();
            return
        }

        createLine(selectedImageX, selectedImageY, selectedOptionX, selectedOptionY, lines[0].id)
        lines.shift();

        alreadyLinedImages.push(selectedImage.id);
        alreadyLinedOptions.push(element.id);
        selectedImage.style.border = "";
        deselect();

        console.log(alreadyLinedImages);
        console.log(alreadyLinedOptions);
    }

    function createLine(x1, y1, x2, y2, lineId) {
        distance = Math.sqrt (((x1-x2)*(x1-x2)) + ((y1-y2)*(y1-y2)));

        xMid = (x1+x2)/2;
        yMid = (y1+y2)/2;

        salopeInRadian = Math.atan2(y1 - y2, x1 - x2);
        salopeInDegrees = (salopeInRadian * 180) / Math.PI;

        let line; 
        line = document.getElementById(lineId);
        line.style.backgroundColor = "red"
        line.style.width = distance + "px";
        line.style.top = yMid + "px";
        line.style.left = xMid - (distance/2) + "px";
        line.style.transform = "rotate("+salopeInDegrees+"deg)";
    }
</script>