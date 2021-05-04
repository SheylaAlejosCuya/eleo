<div class="infomacion">
    <div class="tutorialesVideo">
        @if($lectura->video != null)
            <x-video :continue="$continue" :lectura="$lectura" :alumno="$alumno"/>
        @else
            @if($lectura->image != null)
                <img class="ui fluid rounded image" src="{{$lectura->image}}" style="width: 900px !important;">
                <a class="big positive ui button" style="margin: 1rem !important;" href="{{route('web_video_preguntas1', ['id'=>$lectura->id_reading])}}">Siguiente</a>
            @endif
        @endif     
    </div>
</div>

@if($lectura->video != null){
    <div class="ehelpNote" id="iguanaNote">
        <img src="{{asset('images/iguana.png')}}" alt="">
        <div class="ehelpMessage">"Dale play, reproduce el video y luego responde las preguntas"</div>
    </div>
    
    <script>
        setTimeout(function() { 
            document.getElementById('iguanaNote').style.display = 'none';
         }, 4000);
    </script>
@endif

