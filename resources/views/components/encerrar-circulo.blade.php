<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment twelve wide column">
        <h3>2. ENCIERRA en un círculo las palabras que son alimentos.</h3>
        <div class="ui centered stackable grid">
            <?php
                foreach ($ecData['options'] as $option) {
                    ?>
                        <div class="five wide column">
                            <div class="ui vertical segment">
                                <h2 class="ui header options" data-value="0" onclick="selectOption(this)" style="cursor: pointer">
                                    {{$option}}
                                </h2>
                            </div>
                        </div>
                    <?php
                }
            ?>
            <button class="ui labeled icon green button" onclick="validate()"><i class="check icon"></i>Verificar</button>
        </div>
    </div>
</div>
<script>

    var answerPattern = [];

    <?php
        foreach ($ecData['answers'] as $answer) {
            ?>
                answerPattern.push("{{$answer}}")
            <?php
        }
    ?>

    function selectOption(e) {
        if (e.getAttribute('data-value') === "0") {
            e.parentElement.className = "ui circular segment"
            e.setAttribute('data-value', "1")
        } else {
            e.parentElement.className = "ui vertical segment"
            e.setAttribute('data-value', "0")
        }
    }

    function validate() {


        var options = document.getElementsByClassName("options");
        console.log(answerPattern)
        answerPattern.forEach((e, i) => {
            if (e === "1") {
                if (options[i].getAttribute('data-value') === e) {
                    options[i].parentElement.style.background = "green"
                    options[i].style.color = "white"
                }
            }
            console.log(options[i].getAttribute('data-value'), e)
        });
    }
</script>