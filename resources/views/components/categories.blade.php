<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment twelve wide column">
        <h3>{{$categoriesData['title']}}</h3>
        <div class="ui vertical segment">
            <div class="ui three column centered stackable grid">
                <?php
                    foreach ($categoriesData["options"] as $option) {
                        ?>
                            <div class="column">
                                <div class="ui vertical segment">
                                    <img class="ui fluid image" src="{{$option['img']}}" alt="">
                                </div>
                                <div class="ui vertical segment">
                                    <h5 class="ui header">
                                        {{$option['name']}}
                                    </h5>
                                </div>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
        <div class="ui vertical segment">
            <form class="ui fluid form">
                <?php
                    foreach ($categoriesData["categories"] as $category) {
                        ?>
                                <div class="field" placeholder="Last Name">
                                    <div class="ui pointing below label">
                                        {{$category}}
                                    </div>
                                    <input type="text">
                                </div>
                        <?php
                    }
                ?>
            </form>
        </div>
    </div>
</div>