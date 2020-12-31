<div class="infomacion">
    <div class="tutorialesVideo">
        
        <x-video :continue="$continue" :lectura="$lectura" :alumno="$alumno"/>
                 
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