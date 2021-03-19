<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment sixteen wide column">
        <h3>2. Escribe tres características de cada uno de los escenarios vacacionales que presenta las imágenes del texto.</h3>
        <table class="ui celled padded two column table">
            <thead>
                <tr>
                    <?php
                        foreach ($adData['headers'] as $header) {
                            ?>
                                <th class="center aligned">{{$header}}</th>
                            <?php
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    for ($x = 0; $x < $adData['rows']; $x++) {
                        ?>
                            <tr>
                                <td>
                                    <div class="ui fluid input">
                                        <input type="text">
                                    </div>
                                </td>
                                <td>
                                    <div class="ui form">
                                        <div class="field">
                                            <textarea rows="2"></textarea>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>