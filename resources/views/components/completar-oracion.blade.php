<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment sixteen wide column">
        <h3>3. Coloca los cajones con las palabras en el lugar adecuado de tal manera que el texto tenga sentido.</h3>
        <div class="ui vertical segment six column grid">
            <?php
                foreach ($coData['options'] as $option) {
                    ?>
                        <div class="column">
                            <div class="ui segment options" style="text-align: center" data-value="{{$option['order']}}" draggable="true">{{$option['label']}}</div>
                        </div>
                    <?php
                }
            ?>
        </div>
        <div class="ui vertigal segment">
            <?php
                $index = 0;
                foreach ($coData['oracion'] as $p) {
                    if ($p == "0") {
                        ?>
                            <div class="ui input" style="margin: 4px 8px">
                                <input data-value="{{$index}}" class="answers" type="text" readonly>
                            </div>
                        <?php
                        $index++;
                    } else if ($p == "1") {
                        ?>
                            <br>
                        <?php
                    } else {
                        ?>
                            {{$p}}
                        <?php
                    }
                }
            ?>
        </div>
        <div class="ui labeled icon green button" onclick="verify()">
            <i class="check icon"></i>
            Verificar
        </div>
    </div>
</div>

<script>
    let options = [];
    <?php
        foreach ($coData['options'] as $option) {
            ?>
                options.push("{{$option['order']}}")
            <?php
        }
    ?>
    let answersDOM = document.getElementsByClassName("answers");
    let optionsDOM = document.getElementsByClassName("options");

    console.log(optionsDOM)

    for (var i = 0; i < answersDOM.length; i++) {
        answersDOM[i].addEventListener('dragover', dragOver, false);
        answersDOM[i].addEventListener('dragleave', dragLeave, false);
        answersDOM[i].addEventListener('drop', drop, false);
    }

    for (var i = 0; i < optionsDOM.length; i++) {
        optionsDOM[i].addEventListener('dragstart', dragStart, false);
        optionsDOM[i].addEventListener('dragend', dragEnd, false);
    }

    var dragged;
    
    function dragStart(e) {
        dragged = this;
        console.log("moving: " + this.getAttribute('data-value'))
    }

    function dragEnd(e) {
        console.log("stop moving: " + this.getAttribute('data-value'))
    }

    function dragOver(e) {
        this.style.transform = "scale(1.1)"
        event.preventDefault();
        console.log("this")
        this.style.backgroundColor = "#f8ffff";
        this.style.borderColor = "#a9d5de";
        this.style.color = "#276f";
    }

    function dragLeave(e) {
        this.style.transform = "scale(1)"
        console.log("leaving: " + this.getAttribute('data-value') + " " + this.getAttribute('data-type'))
        this.style.backgroundColor = "";
        this.style.borderColor = "";
        this.style.color = "";
    }

    function drop(e) {
        this.style.transform = "scale(1)"
        console.log(this)
        //this.removeEventListener('dragover', dragOver, false)
        //this.removeEventListener('dragleave', dragLeave, false)
        //this.removeEventListener('drop', drop, false)
        
        var dragged_column = dragged.parentElement;
        this.setAttribute('draggable', false)
        dragged.setAttribute('draggable', false)
        dragged.className = "ui green segment options"
        console.log(dragged.innerHTML)
        this.setAttribute('value', dragged.innerHTML)

        //dragged_column.remove();
        console.log(this.parentElement.childElementCount);
    }

    function verify() {
        
        let res = [];
        for (var i = 0; i < optionsDOM.length; i++) {
            console.log(answersDOM[i].getAttribute('data-value'), answersDOM[i].value);
            console.log(optionsDOM[options.indexOf(String(answersDOM[i].getAttribute('data-value')))].innerHTML);
            if (optionsDOM[options.indexOf(String(answersDOM[i].getAttribute('data-value')))].innerHTML === answersDOM[i].value) {
                res.push(1);
            } else {
                res.push(0);
            }
        }
        console.log(res)

        res.forEach((r, i)=> {
            if (r === 1) {
                optionsDOM[options.indexOf(String(answersDOM[i].getAttribute('data-value')))].setAttribute('draggable', false)
                optionsDOM[options.indexOf(String(answersDOM[i].getAttribute('data-value')))].className = "ui green inverted segment options";
                answersDOM[i].style.backgroundColor = "#fcfff5";
                answersDOM[i].style.borderColor = "#a3c293";
                answersDOM[i].style.color = "#2c662d";
            } else {
                //answersDOM[i].addEventListener('dragover', dragOver, false);
                //answersDOM[i].addEventListener('dragleave', dragLeave, false);
                //answersDOM[i].addEventListener('drop', drop, false);

                answersDOM[i].style.backgroundColor = "#fff6f6";
                answersDOM[i].style.borderColor = "#e0b4b4";
                answersDOM[i].style.color = "#9f3a38";

                optionsDOM[options.indexOf(String(answersDOM[i].getAttribute('data-value')))].setAttribute('draggable', true)
                optionsDOM[options.indexOf(String(answersDOM[i].getAttribute('data-value')))].className = "ui segment options";
            }
        });
    }
</script>