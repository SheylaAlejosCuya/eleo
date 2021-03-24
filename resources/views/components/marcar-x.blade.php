<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment eight wide column">
        <h3 class="ui header">{{$marcarXData['title']}}</h3>
        <div class="ui vertical segment">
            <div class="ui two column grid">
                <?php
                    foreach ($marcarXData['img'] as $img) {
                        ?>
                            <div class="row">
                                <div class="column">
                                    <img class="ui fluid image" src="{{$img}}" alt="">
                                </div>
                                <div class="column" style="display: flex; align-items: center; justify-content: center">
                                    <input type="checkbox" class="XcheckBox">
                                </div>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>