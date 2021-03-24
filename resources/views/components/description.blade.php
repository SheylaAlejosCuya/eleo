<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment sixteen wide column">
        <h3>2. Escribe tres características de cada uno de los escenarios vacacionales que presenta las imágenes del texto.</h3>
        <div class="ui equal width grid">
            <?php
                foreach ($descriptionData['options'] as $option) {
                    ?>
                        <div class="column">
                            <div class="ui segment">{{$option['title']}}</div>
                            <?php
                                for ($x = 0; $x < $option['rows']; $x++) {
                                    ?>
                                        <div class="ui left icon fluid input" style="margin-bottom: 16px;">
                                            <input type="text">
                                            <i class="circle {{$option['color']}} icon"></i>
                                        </div>
                                    <?php
                                }
                            ?>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>