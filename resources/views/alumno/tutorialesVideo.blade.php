<div class="infomacion">
    <div class="tutorialesVideo">
        <?php
            if (isset($continue)) {
                ?>
                    <x-video :continue="$continue"/>
                <?php
            } else {
                ?>
                    <x-video continue=""/>
                <?php
            }
        ?>
    </div>
</div>

<div class="ehelpNote" id="iguanaNote">
    <img src="{{asset('images/iguana.png')}}" alt="">
    <div class="ehelpMessage">"Dale play, reproduce el video y luego responde las preguntas"</div>
</div>

<script>
    setTimeout(function() { 
        document.getElementById('iguanaNote').style.display = 'none';
     }, 4000);
</script>