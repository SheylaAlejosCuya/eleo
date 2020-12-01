<div class="bibliotecaContainer">
    <h2><strong>{{$subtitle}}</strong></h2>
    <div class="actividadesOptions">
        <?php
            foreach ($data as $d) {
                ?>
                    <a href="<?php echo $d['url'] ?>" class="bibliotecaOption">
                        <img class="check" src="{{asset('images/check.png')}}" alt="">    
                        <img src="{{asset('images/desafio1.png')}}" alt="">
                    </a>
                <?php
            }
        ?>
    </div>
</div>