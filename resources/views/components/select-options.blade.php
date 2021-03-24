<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment fourteen wide column">
        <h3>2. ¿Cuál de los juegos propuestos ayudan a los niños a desarrollar su motricidad gruesa?</h3>
        <div class="ui stackable grid">
            <div class="<?php if ($soData['direction'] === 'vertical') { ?> sixteen wide <?php } else { ?> ten wide <?php } ?> column">
                <div class="ui {{$soData['columns']}} column centered grid">
                    <?php
                        foreach ($soData['images'] as $image) {
                            ?>
                                <div class="column">
                                    <img class="ui fluid image" src="{{$image}}" alt="Inicio">
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <div class="<?php if ($soData['direction'] === 'vertical') { ?> sixteen wide <?php } else { ?> six wide <?php } ?> column" style="display: flex; flex-direction: column; justify-content: space-around;">
                <?php
                    $index = 0;
                    foreach ($soData['options'] as $option) {
                        ?>
                            <div onclick="selectOption(this)" id="{{$index}}" class="ui segment" style="cursor: pointer;">{{$option}}</div>
                        <?php
                        $index++;
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    let selectedOption = null;
    function selectOption(e) {
        if (selectedOption != null) {
            console.log(selectedOption)
            let actualOption = document.getElementById(selectedOption);
            actualOption.className = "ui segment";
        }
        selectedOption = e.id;
        e.className = "ui segment green inverted";
    }
</script>

