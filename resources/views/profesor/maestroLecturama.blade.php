<div class="bibliotecaOptions">
    <div class="lecturamaOption">

        @foreach ($lecturamas as $lecturama)
            <img src="{{asset($lecturama->image)}}" alt="">
            <a href="{{route('api_descargar_pdf_lecturama', ['id_lecturama' => $lecturama->id_lecturama])}}" class="large ui green basic button">Descargar</a>
            <br>
        @endforeach
        


    </div>
</div>