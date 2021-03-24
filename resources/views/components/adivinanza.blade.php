<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment twelve wide column">
        <h3>1. A continuación, descubrirás uno de los 10 símbolos que representan a nuestro Perú. Tienes 5 pistas para descubrirlo. Escribe tu respuesta en el espacio blanco. Mientras más rápido lo descubras, ¡mejor!</h3>
        <div class="ui centered stackable grid">
            <div class="nine wide column ui stackable centered grid">
                <div class="row">
                    <div class="twelve wide column" style="position: relative;">
                        <div id="pImageContainer" class="ui seven column grid" style="background-image: url('https://images-na.ssl-images-amazon.com/images/I/61tYRReiwJL._AC_UX385_.jpg'); background-size: cover">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="inline field" style="text-align: left; margin-bottom: 8px">
                        <i class="gem green large icon"></i>
                        <div class="ui left pointing label" id="clue" style="display: none;">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <div class="ui fluid input">
                            <input id="answer" type="text" placeholder="Respuesta">
                        </div>
                    </div>
                </div>
            </div>
            <div class="seven wide column">
                <div class="ui segment" style="height: 100%; background-color: #f8f8f9; text-align: center">
                    <button class="ui orange button" onclick="useClue()">Pedir Pista</button>
                    <div class="ui centered three column grid" style="margin-top: 8px">
                        <div class="column">
                            <div class="ui segment" style="text-align: center; cursor: pointer;"><i class="gem grey large icon clueField"></i></div>
                        </div>
                        <div class="column">
                            <div class="ui segment" style="text-align: center; cursor: pointer;"><i class="gem grey large icon clueField"></i></div>
                        </div>
                        <div class="column">
                            <div class="ui segment" style="text-align: center; cursor: pointer;"><i class="gem grey large icon clueField"></i></div>
                        </div>
                        <div class="column">
                            <div class="ui segment" style="text-align: center; cursor: pointer;"><i class="gem grey large icon clueField"></i></div>
                        </div>
                        <div class="column">
                            <div class="ui segment" style="text-align: center; cursor: pointer;"><i class="gem grey large icon clueField"></i></div>
                        </div>
                    </div>
                    <button class="ui labeled icon green button" onclick="validate()" style="margin-top: 32px"><i class="check icon"></i>Verificar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var clue = document.getElementById("clue");

    var answer = "El chullo peruano"

    var pImageContainer = document.getElementById('pImageContainer');
    pImageContainer.style.height = pImageContainer.offsetWidth + "px";
    var pInfoArray = [
        [2, 3, 3, 2, 1, 4, 4],
        [1, 3, 1, 4, 5, 5, 3],
        [1, 5, 5, 5, 3, 2, 5],
        [2, 5, 1, 4, 5, 2, 5],
        [2, 4, 3, 3, 5, 2, 4],
        [5, 1, 5, 3, 4, 2, 3],
        [5, 1, 4, 2, 4, 1, 1]
    ]
    var clues = ["Alpaca", "Birrete Español", "Orejeras", "Borlas", "Autóctono"];
    var usedClues = 0;

    pInfoArray.forEach(e => {
        e.forEach(r => {
            var newEl = document.createElement('div');
            newEl.setAttribute('data-value', r);
            newEl.className = "orange pfield column"
            newEl.style.border = "1px solid #ffedde"
            
            
            newEl.style.zIndex = "100";
            console.log(pImageContainer.offsetWidth)
            
            pImageContainer.appendChild(newEl)
        });
    });

    function useClue() {
        var pfields = document.getElementsByClassName("pfield");
        var clueFields = document.getElementsByClassName("clueField");

        usedClues++;
        console.log(usedClues)
        for (var i = 0; i < pfields.length; i++) {
            if (pfields[i].getAttribute('data-value') === String(usedClues)) {
                clue.style.display = "unset";
                clue.innerHTML = clues[usedClues - 1];
                pfields[i].style.opacity = "0%";
                clueFields[usedClues - 1].className = "gem green big icon clueField"
            }
        }
    }

    function validate() {
        var userAnswer = document.getElementById("answer")
        if (userAnswer.value === answer) {
            alert("GANASTE!")
        }
    }

</script>