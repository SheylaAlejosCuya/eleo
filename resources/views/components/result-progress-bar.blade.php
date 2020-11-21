<div class="resultProgressBarContainer">
    <div class="resultProgressBar__title">
        {{$title}}
    </div>
    <div class="resultProgressBars">
        <?php
            foreach ($results as $result) {
                ?>
                    <div class="resultProgressBar">
                        <div class="resultProgressBar__info">
                            <p class="rText">{{$result['title']}}</p>
                            <p class="rPercent">
                                <?php
                                    if ($result['percent'] == 100) {
                                        echo "¡Completado!";
                                    } else {
                                        echo $result['percent']."%";
                                    }
                                ?>
                            </p>
                        </div>
                        <div class="rBackBar">
                            <div class="rBar" style="width: <?php echo $result['percent']."%" ?>"></div>
                        </div>
                    </div>
                <?php
            }
        ?>
    </div>
</div>