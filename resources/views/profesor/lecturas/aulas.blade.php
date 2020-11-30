<link rel="stylesheet" href="{{asset('css/aulas.css')}}">
<div class="infomacion">
    <h4>{{$subtitle}}</h4>
    <div class="aulaTable">
        <?php
            foreach ($data as $d) {
                ?>
                    <a href="<?php echo $d['url'] ?>" class="aulaOption">
                        <img class="check" src="{{asset('images/check.png')}}" alt="">
                        <img src="{{asset('images/pizarar.png')}}" alt="">
                        <p>{{$d['grado']}}</p>
                    </a>
                <?php
            }
        ?>
    </div>
</div>