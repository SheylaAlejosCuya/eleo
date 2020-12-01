<link rel="stylesheet" href="{{asset('css/foro.css')}}">
<div class="infomacion">
    <div class="foroCrear">
        <input type="text" name="" id="" placeholder="Título">
        <textarea name="" id="" cols="30" rows="5" placeholder="Redactar foro"></textarea>
        <p><i class="fas fa-paperclip"></i>Adjuntar imagen o video</p>
        <div class="botones">
            <button class="saveButton">Asignar</button>
            <button class="cancelButton">Cancelar</button>
        </div>
    </div>
</div>
<div class="modalContainer" id="asignar" hidden>
    <div class="asignarContainer">
        <div class="asignarModal">
            <p>Asignar a</p>
            <div class="asignarGrados">
                <div class="asignarGradosOption">
                    <input type="checkbox" name="" id="">
                    <p>1ro "A"</p>
                </div>
                <div class="asignarGradosOption">
                    <input type="checkbox" name="" id="">
                    <p>1ro "B"</p>
                </div>
                <div class="asignarGradosOption">
                    <input type="checkbox" name="" id="">
                    <p>1ro "C"</p>
                </div>
                <div class="asignarGradosOption">
                    <input type="checkbox" name="" id="">
                    <p>2do "B"</p>
                </div>
            </div>
            <button class="saveButton">Publicar</button>
        </div>
        <p>Cerrar</p>
    </div>
</div>