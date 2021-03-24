<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment twelve wide column">
        <h3>{{$acrosticoData['title']}}</h3>
        <form class="ui form">
            <?php
                $string_array = str_split($acrosticoData["word"]);
                foreach ($string_array as $letter) {
                    ?>
                            <div class="fluid field">
                                <div class="ui labeled input">
                                    <div class="ui right pointing label">
                                        {{$letter}}
                                    </div>
                                    <input class="ui input " type="text" required>
                                </div>
                            </div>
                    <?php
                }
            ?>
        </form>
    </div>
</div>