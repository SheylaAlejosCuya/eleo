<div class="actividadPreview">
    <div class="actividadPreview__top">
        <div class="actividadImg">
            <img src="{{asset('images/a.png')}}" alt="">
            <h1>Gaby y sus gatitos</h1>
        </div>
        <div class="actividadPreview__topRight">
            <button class="saveButton">Asignar</button>
        </div>
    </div>
    <div class="actividadePreview__bottom">
        <div class="actividadOptionRow profileInfoRow">
            <div class="profileTitle">Video</div>
            <button class="cancelButton">Previsualizar</button>
        </div>
        <div class="actividadOptionRow profileInfoRow">
            <div class="profileTitle">Escuchar Audio</div>
            <button class="cancelButton">Previsualizar</button>
        </div>
        <div class="actividadOptionRow profileInfoRow">
            <div class="profileTitle">Visualizar Texto</div>
            <button class="cancelButton">Previsualizar</button>
        </div>
        <div class="actividadOptionRow profileInfoRow">
            <div class="profileTitle">Actividad de Producción</div>
            <button class="cancelButton">Previsualizar</button>
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
                <button class="saveButton">Guardar</button>
            </div>
            <p>Cerrar</p>
        </div>
    </div>
    <div class="modalContainer" id="video" hidden>
        <div class="asignarContainer">
            <div style="position: relative;">
                <div class="nextButtonL" style="top: 50%">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <x-video />
                <div class="nextButtonR" style="top: 50%">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            <p>Cerrar</p>
        </div>
    </div>
    <div class="modalContainer" id="preguntas" hidden>
        <div class="asignarContainer">
            <div class="asignarModal" style="padding-right: 32px;">
                <div class="nextButtonL">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="epreguntas">
                    <div class="rpt">
                        <h5>¿Qué pensaban los egipcios sobre la muerte?</h5>
                        <textarea class="rspInput" rows="4" cols="50" placeholder="Escribe tu respuesta"></textarea>
                    </div>
                </div>
                <br>
                <div class="epreguntas">
                    <div class="rpt">
                        <h5>¿Para qué se hacían las momificaciones?</h5>
                        <textarea class="rspInput" rows="4" cols="50" placeholder="Escribe tu respuesta"></textarea>
                    </div>
                </div>
                <div class="nextButtonR">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            <p>Cerrar</p>
        </div>
    </div>
    <div class="modalContainer" id="audio" hidden>
        <div class="asignarContainer">
            <div style="position: relative">
                <div class="nextButtonL" style="bottom: 0;">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <audio controls>
                    <source src="horse.ogg" type="audio/ogg">
                </audio>
                <div class="nextButtonR" style="bottom: 0;">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            <p>Cerrar</p>
        </div>
    </div>
    <div class="modalContainer" id="opciones" hidden>
        <div class="asignarContainer" style="width: unset">
            <div class="asignarModal" style="padding: 32px">
                <div class="nextButtonL">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="epreguntas-c">
                    <h2 id="titulo"><b>Nivel literal</b></h2>
                    <div class="epreguntas">
                        <div class="rpt">
                            <h5><b>1. Keops, Kefren y Micerino</b></h5>
                            <a href="" class="btn-block">a. Rios egipcios.</a>
                            <a href="" class="btn-block">b. Faraones.</a>
                            <a href="" class="btn-block">c. Ciudades egipcias.</a>
                            <a href="" class="btn-block">d. Pirámides.</a>
                        </div>
                    </div> 
                </div>
                <div class="nextButtonR">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            <p>Cerrar</p>
        </div>
    </div>
    <div class="modalContainer" id="texto" hidden>
        <div class="asignarContainer">
            <div class="asignarModal">
                <div class="nextButtonL">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="modalText">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum quos ducimus voluptatibus fugiat eaque culpa eius amet tenetur? Et tempora ullam reiciendis sapiente sunt dolores suscipit corrupti nobis eligendi placeat!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum quos ducimus voluptatibus fugiat eaque culpa eius amet tenetur? Et tempora ullam reiciendis sapiente sunt dolores suscipit corrupti nobis eligendi placeat!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum quos ducimus voluptatibus fugiat eaque culpa eius amet tenetur? Et tempora ullam reiciendis sapiente sunt dolores suscipit corrupti nobis eligendi placeat!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum quos ducimus voluptatibus fugiat eaque culpa eius amet tenetur? Et tempora ullam reiciendis sapiente sunt dolores suscipit corrupti nobis eligendi placeat!
                </div>
                <div class="nextButtonR">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            <p>Cerrar</p>
        </div>
    </div>
    <div class="modalContainer" id="produccion">
        <div class="asignarContainer">
            <div class="asignarModal">
                <div class="nextButtonL">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="modalText">
                    <h1><strong>Sustenta tu respuesta</strong></h1>
                    ¿En qué se parecen o en qué se diferencianlas creencias religiosas de los egipcios con las nuestras?
                </div>
                <div class="nextButtonR">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            <p>Cerrar</p>
        </div>
    </div>
</div>

