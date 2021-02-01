<link rel="stylesheet" href="{{asset('css/lecturas.css')}}">
<style>
.upload-btn-wrapper {
  position: relative;
  display: inline-block;
}

.btn {
  border: 2px solid rgb(15, 136, 46);
  color: rgb(22, 123, 34);
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
  width: 175px;
  height: 65px;
}
</style>

<div class="modal" id="exampleModal" tabindex="-1" aria-hidden="true">
  
  <div class="eActividadNote">
    
    <img class="nino_image" src="{{asset('images/nino.png')}}" alt="">
    
    <div class="actividadContainer">
      <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span style="bottom:-20px;" aria-hidden="true" style="color: green"><h2>&times;</h2></span>
      </button>
     
        <div class="eActividadRow eActividadBorder"  >
            <div class="eActividadTitle">
                <h1>PRIMER PASO</h1>
                <h5>SELECCION DEL TEMA</h5>
            </div>
            <div class="eActividadDescripcion">
                <b> <strong>Selecciona</strong>  uno de los siguientes temas para elaborar tu infografía.</b>
                <li><b>Los principales logros de la cultura egipcia.</b></li>
                <li><b>La organización social de la civilización egipcia.</b></li>
            </div>
        </div>
        <div class="eActividadRow eActividadBorder">
            <div class="eActividadTitle">
                <h1>SEGUNDO PASO</h1>
                <h5>INDAGACIÓN</h5>
            </div>
            <div class="eActividadDescripcion">
              <li><b> <strong>Indaga</strong> sobre el tema seleccionado en diversas fuentes.</b></li>
              <li><b> <strong>Selecciona</strong> dos fuentes de indagación.</b></li>
              <li><b> <strong>Identifica </strong>las ideas más importantes en tus fuentes de  indagación seleccionadas.</b></li>
            </div>
        </div>
        <div class="eActividadRow">
            <div class="eActividadTitle">
                <h1>TERCER PASO</h1>
                <h5>PRODUCCIÓN</h5>
            </div>
            <div class="eActividadDescripcion">
              <li><b><strong>Organiza</strong> la información sobre tu tema en 3 a 5 aspectos que consideres importantes.</b></li>
              <li><b><strong>Organiza</strong> cada aspecto en tu infografía, empleando imágenes y texto (Borrador).</b></li>
              <li><b><strong>Revisa</strong> y corrige tu infografía.</b></li>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="infomacion">
  <h5 style="padding-top: 20px;">
    Una infografía es un texto de fácil comprensión que utiliza imágenes o gráficos junto con textos escritos para proporcionar información acerca de lo que se desea comunicar. Cabe resaltar que el texto escrito que emplea una infografía es resumido, porque se complementa con las imágenes para brindar un rápido entendimiento del tema al lector. </h5>
  <div class="infografiaInfo">
    <div class="infografiaPasos">
      <p style="color:#00a3fb; font-size:2rem">Pasos para elaborar una infografía</p>           
      <p><b>Primer paso: </b>Planifica tu infografía</p>
      <p><b>Segundo paso: </b>Redacta tu infografía
      <li style="font-size: 20px">Edita tu infografía en la Presentación final.</li>
      <li style="font-size: 20px">Publica tu infografía en esta plataforma.</li> 
    </p>     
      <p><b>Tercer paso: </b>Reflexiona sobre tu aprendizaje</p>
    </div>
    <div class="infografiaImagen">
      <img src="{{asset('images/info.jpeg')}}" alt="">
    </div>
  </div>
  <div class="ebuttons" style="font-family:'Nunito', sans-serif;"> 
    <button class="verActivity" data-toggle="modal" data-target="#exampleModal">Planificación</button>

    <div class="upload-btn-wrapper">
      <button class="btn">Subir archivo</button>
      <input type="file" name="custom_file" id="custom_file" />
    </div>

    <button class="saveButton" onclick="saveFile()">Enviar</button>

    <a href="{{route('web_libros')}}"><button class="cancelButton">Finalizar</button></a>
  </div>
</div>

@prepend('scripts')
<script>
  
    function saveFile() {

        var custom_file = document.querySelector('#custom_file').files[0];

        if(custom_file == null){
            showMessage("warning", "Sin archivo que actualizar");
            return;
        }

        var data = new FormData();
        data.append('custom_file', custom_file);
        data.append('id_user', "{{$alumno->id_user}}");
        data.append('id_question', "{{$pregunta_final->id_question}}");
        
            $.ajax({
                type: "POST",
                url: "{{route('api_preguntas_bloque5')}}",
                enctype: 'multipart/form-data',
                contentType: false,
                cache: false,
                processData: false,  // Important!
                data: data ,
                success: function(response) { 
                    console.log(response);
                    showMessage("success", "Archivo enviado correctamente");
                },
                error: function(e) {
                    console.log(e); 
                    showMessage("warning", "Error al subir el archivo");
                }
            });
    }

    function showMessage(type, message) {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "timeOut": "2000",
            "extendedTimeOut": "2000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr[type](message);
    }
</script>
@endprepend
