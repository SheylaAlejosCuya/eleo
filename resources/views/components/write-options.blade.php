<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment twelve wide column">
        <h3>{{$woData['title']}}</h3>
        <div class="ui vertical segment">
            <div class="ui equal width grid">
                <?php
                    if (array_key_exists('img', $woData)) {
                    ?>
                        <div class="column">
                            <div class="ui centered stackable grid">
                                <div class="twelve wide column">
                                    <img src="{{$woData['img']}}" alt="" class="ui fluid image">
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                ?>
                <div class="column">
                    <div class="ui vertigal segment">
                        {{$woData['example']}}
                    </div>
                    <?php
                        for ($x = 0; $x < $woData['rows']; $x++) {
                            ?>
                                <div class="ui left icon fluid input" style="margin-bottom: 16px;">
                                    <input type="text">
                                    <i class="circle green icon"></i>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>