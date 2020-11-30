<link rel="stylesheet" href="{{asset('css/libros.css')}}">
<div class="infomacion">
    <h4>{{$subtitle}}</h4>
    <div class="book-table">
        <?php
            foreach ($data as $d) {
                ?>
                    <a class="book-card" href="<?php echo $d['url'] ?>">
                        <img src="<?php echo $d['img'] ?>" alt="">
                    </a>
                <?php
            }
        ?>
    </div>
</div>