<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment ten wide column">
        <h3>1. Selecciona con una flecha de qué material están forradas estas estatuas.</h3>
        <div class="ui vertical segment">
            <div id="arrowContainer" class="ui three column grid">
                
                <?php
                    $arrowValue = 1;
                    foreach ($agData as $data) {
                        ?>
                            <div class="line" id="line{{$arrowValue}}" style="background-color: black; position: absolute; height: 5px; display: none"></div>
                            <div class="row">
                                <div class="column">
                                    <?php
                                        if ($data[0]['type'] === 0) {
                                            ?>
                                                <div onClick="setSelectedImage(this)" id="{{$data[0]['value']}}" class="ui segment" style="text-align: center; cursor: pointer">{{$data[0]['text']}}</div>
                                            <?php
                                        } else {
                                            ?>
                                                <img onClick="setSelectedImage(this)" id="{{$data[0]['value']}}" class="ui fluid image" style="cursor: pointer" src="{{$data[0]['img']}}" alt="">        
                                            <?php
                                        }
                                    ?>
                                </div>
                                <div class="column"></div>
                                <div class="column">
                                    <?php
                                        if ($data[1]['type'] === 0) {
                                            ?>
                                                <div onClick="setSelectedOption(this)" id="{{$data[1]['value']}}" class="ui segment" style="text-align: center; cursor: pointer">{{$data[1]['text']}}</div>
                                            <?php
                                        } else {
                                            ?>
                                                <img onClick="setSelectedOption(this)" id="{{$data[1]['value']}}" class="ui fluid image" style="cursor: pointer" src="{{$data[1]['img']}}" alt="">        
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        <?php
                        $arrowValue++;
                    }
                ?>

                
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
                element.style.border = "5px solid #39B54A";
            }
        } else {
            selectedImage = element;
            element.style.border = "5px solid #39B54A";
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
        line.style.display = "unset"
        line.style.backgroundColor = "#39B54A"
        line.style.width = distance + "px";
        line.style.top = yMid + "px";
        line.style.left = xMid - (distance/2) + "px";
        line.style.transform = "rotate("+salopeInDegrees+"deg)";
    }
</script>