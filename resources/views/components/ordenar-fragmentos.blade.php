<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment twelve wide column">
        <h3>2. ENCIERRA en un círculo las palabras que son alimentos.</h3>
        <div class="ui vertical segment">
            <?php
                foreach ($ofData['options'] as $option) {
                    ?>
                        {{$option['label']}}. {{$option['text']}} <br>
                    <?php
                }
            ?>
        </div>
        <div class="ui vertical segment">
            <div class="ui equal width grid">
                <?php
                    foreach ($ofData['options'] as $option) {
                        ?>
                            <div class="column">
                                <div class="ui fluid input">
                                    <input class="answer" type="text">
                                </div>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
        <button class="ui labeled icon green button" onclick="validate()"><i class="check icon"></i>Verificar</button>
    </div>
</div>
<script>
    var answerPattern = [];

    <?php
        foreach ($ofData['answerOrder'] as $answer) {
            ?>
                answerPattern.push("{{$answer}}")
            <?php
        }
    ?>
    const equals = (a, b) => JSON.stringify(a) === JSON.stringify(b);
    function validate() {
        console.log(answerPattern)
        var userAnswerInputs = document.getElementsByClassName("answer");
        var userAnswer = [];
        for (var i = 0; i < userAnswerInputs.length; i++) {
            userAnswer.push(userAnswerInputs[i].value)
        }
        if (equals(userAnswer, answerPattern)) {
            alert("ganaste")
        }
        
    }
</script>