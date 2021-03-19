
<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment sixteen wide column">
        <h3>3. Coloca los cajones con las palabras en el lugar adecuado de tal manera que el texto tenga sentido.</h3>
        <div class="ui vertical segment equal width grid">
            <?php
                foreach ($word as $letter) {
                    ?>
                        <div class="column">
                            <div class="ui segment options" style="text-align: center" data-value="{{$letter}}" draggable="true">{{$letter}}</div>
                        </div>
                    <?php
                }
            ?>
        </div>
        <div class="ui segment equal width grid" id="answer" style="height: 77.64px"></div>
        <div class="ui labeled icon green button" onclick="verify()">
            <i class="check icon"></i>
            Verificar
        </div>
    </div>
</div>

<script>
    let answer = "{{$answer}}";
    let answerArray = answer.split("");
    let userAnswer = [];
    console.log(answerArray)

    let answerContainer = document.getElementById("answer");
    let optionsDOM = document.getElementsByClassName("options");

    answerContainer.addEventListener('dragover', dragOver, false);
    answerContainer.addEventListener('dragleave', dragLeave, false);
    answerContainer.addEventListener('drop', drop, false);

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
        this.style.borderColor = "#21ba45"
        event.preventDefault();
    }

    function dragLeave(e) {
        this.style.borderColor = ""
        console.log("leaving: " + this.getAttribute('data-value') + " " + this.getAttribute('data-type'))
    }

    function drop(e) {
        this.style.borderColor = ""
        console.log(this)
        dragged.setAttribute('draggable', false)
        dragged.className = "ui green segment options"
        //Crear nueva columna
        var newCol = document.createElement('div');
        newCol.className = "column";
        //Crear nuevo segmento
        var newSeg = document.createElement('div');
        newSeg.className = "ui inverted segment answers";
        newSeg.innerHTML = dragged.getAttribute('data-value')
        newSeg.style.textAlign = "center"
        //Insertar segmento en columna y columna a contenedor
        newCol.appendChild(newSeg)
        this.appendChild(newCol)
        userAnswer.push(dragged.getAttribute('data-value'))
        console.log(userAnswer)
        console.log(answerArray)
    }

    const equals = (a, b) => JSON.stringify(a) === JSON.stringify(b);

    function verify() {
        let answersDOM = document.getElementsByClassName("answers")
        if (equals(userAnswer, answerArray)) {
            for (var i = 0; i < answersDOM.length; i++) {
                answersDOM[i].className = "ui green inverted segment answers"
            }
        } else {
            for (var i = 0; i < answersDOM.length; i++) {
                answersDOM[i].className = "ui red inverted segment answers"
            }
        }
    }
</script>