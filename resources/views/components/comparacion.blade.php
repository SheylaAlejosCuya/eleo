<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment twelve wide column">
        <h3>3. Establece las relaciones entre el anuncio de BUFFALO BEEF y el de GITANILLO, teniendo en cuenta los aspectos que se dan a continuación</h3>
        <div class="ui vertical segment">
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th class="four wide">Aspectos</th>
                        <?php
                            foreach ($cdata['opciones'] as $option) {
                                ?>
                                    <th class="six wide">{{$option['name']}}</th>
                                <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($cdata['aspectos'] as $aspect) {
                            ?>
                                <tr>
                                    <td>{{$aspect}}</td>
                                    <td>
                                        <div class="ui fluid input">
                                            <input type="text">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="ui fluid input">
                                            <input type="text">
                                        </div>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
            <div class="ui equal width grid">
                <?php
                    foreach ($cdata['opciones'] as $option) {
                        ?>
                            <div class="column">
                                <img class="ui fluid image" src="{{$option['img']}}" alt="">
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>