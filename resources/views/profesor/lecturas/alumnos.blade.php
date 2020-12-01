<link rel="stylesheet" href="{{asset('css/aulas.css')}}">
<div class="infomacion">
    <h4>{{$subtitle}}</h4>
    <div class="aulaTable">
        <?php
            foreach ($data as $d) {
                ?>
                    <a href="<?php echo $d['url'] ?>" class="alumnoOption">
                        <img class="check" src="{{asset('images/check.png')}}" alt="">
                        <img src="{{asset('images/chico.png')}}" alt="">
                        <p>{{$d['nombre']}}</p>
                    </a>
                <?php
            }
        ?>
    </div>
</div>