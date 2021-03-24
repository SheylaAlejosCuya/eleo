<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment column">
        <h3>2. ENCIERRA en un círculo las palabras que son alimentos.</h3>
        <div class="ui centered stackable grid">
            <?php
                foreach ($scData['options'] as $option) {
                    ?>
                        <div class="eight wide column">
                            <div class="ui segment">
                                <p class="options" data-value="0" onclick="selectOption(this)" style="cursor: pointer">
                                    {{$option}}
                                </p>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
        <br>
        <button class="ui labeled icon green button" onclick="validate()"><i class="check icon"></i>Verificar</button>
    </div>
</div>
<script>

    var answerPattern = [];

    <?php
        foreach ($scData['answers'] as $answer) {
            ?>
                answerPattern.push("{{$answer}}")
            <?php
        }
    ?>

    function selectOption(e) {
        if (e.getAttribute('data-value') === "0") {
            e.parentElement.className = "ui blue inverted segment"
            e.setAttribute('data-value', "1")
        } else {
            e.parentElement.className = "ui segment"
            e.setAttribute('data-value', "0")
        }
    }

    function validate() {


        var options = document.getElementsByClassName("options");
        console.log(answerPattern)
        answerPattern.forEach((e, i) => {
            if (e === "1") {
                if (options[i].getAttribute('data-value') === e) {
                    options[i].parentElement.className = "ui green inverted segment"
                }
            }
            console.log(options[i].getAttribute('data-value'), e)
        });
    }
</script>