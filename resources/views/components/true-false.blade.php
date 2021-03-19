<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment fourteen wide column">
        <h3>4. Escribe SI o NO frente a cada afirmación, relacionada con la elaboración de la segunda receta.</h3>
        <div class="ui grid">
            <?php
                $index = 0;
                foreach ($tfData['options'] as $option) {
                    ?>
                        <div class="fourteen wide column">
                            <div class="ui warning message">
                                {{$option}}
                            </div>
                        </div>
                        <div class="two wide column">
                            <div onclick="setTF(this)" class="ui message" style="text-align: center; cursor: pointer" id={{$index}} data-value=null>
                                -
                            </div>
                        </div>
                    <?php
                    $index++;
                }
            ?>
        </div>
    </div>
</div>
<script>
    function setTF(e) {
        console.log(e.getAttribute('data-value'))
        if (e.getAttribute('data-value') == "null") {
            e.setAttribute('data-value', 1);
            e.className = "ui green message";
            e.innerHTML = "V";
        } else if (e.getAttribute('data-value') == 1) {
            e.setAttribute('data-value', 0);
            e.className = "ui red message";
            e.innerHTML = "F";
        } else if (e.getAttribute('data-value') == 0) {
            e.setAttribute('data-value', 1);
            e.className = "ui green message";
            e.innerHTML = "V";
        }
    }
</script>