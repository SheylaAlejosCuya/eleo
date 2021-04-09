<div class="ui stackable centered grid">

    <div class="ten wide column">
        <div class="ui middle aligned equal width stackable grid">
            <div class="column">
                <h2 class="ui center aligned icon header">
                    <img class="ui inline icon image" src="{{asset($lectura->image_card)}}" alt="" style="width: 200px">
                    {{$lectura->title}}
                </h2>
            </div>
            <div class="column">
                <div class="ui grid">
                    <div class="center aligned column">
                        <button class="ui green button" onclick="openModal('asignar')" style="width: 70%">Asignar</button>
                    </div>
                </div>
            </div>
        </div>
        <br/><br/>
        <div class="ui vertical segment">
            <div class="ui stackable grid">
                <div class="eight wide column">
                    <h2 class="ui header">Video</h2>
                </div>
                <div class="four wide column">
                    <button class="ui green inverted fluid button" onclick="openModal('video')">Ver video</button>
                </div>
                <div class="four wide column">
                    <button class="ui green inverted fluid button" onclick="openModal('videoPreguntas')">Ver preguntas</button>
                </div>
            </div>
        </div>
        <div class="ui vertical segment">
            <div class="ui stackable grid">
                <div class="eight wide column">
                    <h2 class="ui header">Audio</h2>
                </div>
                <div class="four wide column">
                    <button class="ui green inverted fluid button" onclick="openModal('audio')">Escuchar audio</button>
                </div>
                <div class="four wide column">
                    <button class="ui green inverted fluid button" onclick="openModal('audioPreguntas')">Ver preguntas</button>
                </div>
            </div>
        </div>
        <div class="ui vertical segment">
            <div class="ui stackable grid">
                <div class="eight wide column">
                    <h2 class="ui header">Texto</h2>
                </div>
                <div class="four wide column">
                    <button class="ui green inverted fluid button" onclick="openModal('texto')">Ver texto</button>
                </div>
                <div class="four wide column">
                    <button class="ui green inverted fluid button" onclick="openModal('textoPreguntas')">Ver preguntas</button>
                </div>
            </div>
        </div>
        <div class="ui vertical segment">
            <div class="ui stackable grid">
                <div class="twelve wide column">
                    <h2 class="ui header" style="height: unset">Actividad de Producción</h2>
                </div>
                <div class="four wide column">
                    <button class="ui green inverted fluid button" onclick="openModal('produccion')">Previsualizar</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="ui modal" id="asignar">
        <i class="close icon"></i>
        <div class="header">
            Asignar a
        </div>
        <div class="content">
            <div class="ui centered stackable grid">
                
                @foreach($salones as $salon)

                    <div class="five wide column">
                        <div class="ui middle aligned grid">
                            <div class="two wide column">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="classroom_checkbox" id='{{'classroom_'.$salon->id_classroom}}' value={{$salon->id_classroom}}>
                                    <label></label>
                                </div>
                            </div>
                            <div class="center aligned fourteen wide column">
                                <div class="ui segment">
                                    <div class="ui huge header">{{$salon->grade->grade.$salon->section->section}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="actions">
            <div class="ui positive button" onclick="guardar()">
                Guardar
            </div>
        </div>
    </div>

    <div class="ui basic modal" id="video" tabindex="-1" aria-hidden="true">
        <div class="content">
            {{-- <x-video continue="" lectura="" alumno=""/> --}}
        </div>
        <div class="actions">
            <h4 class="cancel" style="cursor: pointer">
                Cerrar
            </h4>
        </div>
    </div>

    <div class="ui modal" id="videoPreguntas">
        <i class="close icon"></i>
        <div class="content">
            <div class="ui small form">
                <div class="field">
                    <label>¿Qué pensaban los egipcios sobre la muerte?</label>
                    <textarea rows="2" readonly placeholder="Escribe tu respueta"></textarea>
                </div>
                <div class="field">
                    <label>¿Qué relación tiene el corazón con el juicio de Osiris?</label>
                    <textarea rows="2" readonly placeholder="Escribe tu respueta"></textarea>
                </div>
                <div class="field">
                    <label>¿Para qué se hacían las momificaciones?</label>
                    <textarea rows="2" readonly placeholder="Escribe tu respueta"></textarea>
                </div>
                <div class="field">
                    <label>¿En qué se parecen o en qué se diferencian las creencias religiosas de los egipcios con las nuestras?</label>
                    <textarea rows="2" readonly placeholder="Escribe tu respueta"></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="ui tiny modal" id="audioPreguntas">
        <i class="close icon"></i>
        <div class="content">
            <div class="ui shape">
                <div class="sides">
                    <div class="active side">
                        <h1 class="ui dividing header" style="color: #00a3fb">
                            Nivel Literal
                        </h1>
                        <div class="ui small form">
                            <div class="field">
                                <label><h4>Además de las pirámides de Egipto, ¿qué se construyó a la sombra de ellas?</h4></label>
                                <input readonly value="a. Se construyeron acueductos." /><br><br>
                                <input readonly value="b. Se edificaron coliseos de entretenimiento." /><br><br>
                                <input readonly value="c. Se alzaron ciudades para los hombres." /><br><br>
                                <input readonly value="d. Se construyeron almacenes para guardar las cosechas." />
                            </div>
                            <div class="field">
                                <label><h4>Sobre los obreros que trabajaban en las piramides se puede afirmar que:</h4></label>
                                <input readonly value="a. Eran esclavos." /><br><br>
                                <input readonly value="b. Eran campesinos que contrataba el faraón en los meses en los que no habia labor en el campo." /><br><br>
                                <input readonly value="c. Llegaban desde muy lejos y vivían en la calles." /><br><br>
                                <input readonly value="d. No recibían ningún pago por el trabajo que realizaban." />
                            </div>
                        </div>
                    </div>
                    <div class="side">
                        <h1 class="ui dividing header" style="color: #00a3fb">
                            Nivel Inferencial
                        </h1>
                        <div class="ui small form">
                            <div class="field">
                                <label><h4>Además de las pirámides de Egipto, ¿qué se construyó a la sombra de ellas?</h4></label>
                                <input readonly value="a. Se construyeron acueductos." /><br><br>
                                <input readonly value="b. Se edificaron coliseos de entretenimiento." /><br><br>
                                <input readonly value="c. Se alzaron ciudades para los hombres." /><br><br>
                                <input readonly value="d. Se construyeron almacenes para guardar las cosechas." />
                            </div>
                            <div class="field">
                                <label><h4>Sobre los obreros que trabajaban en las piramides se puede afirmar que:</h4></label>
                                <input readonly value="a. Eran esclavos." /><br><br>
                                <input readonly value="b. Eran campesinos que contrataba el faraón en los meses en los que no habia labor en el campo." /><br><br>
                                <input readonly value="c. Llegaban desde muy lejos y vivían en la calles." /><br><br>
                                <input readonly value="d. No recibían ningún pago por el trabajo que realizaban." />
                            </div>
                        </div>
                    </div>
                    <div class="side">
                        <h1 class="ui dividing header" style="color: #00a3fb">
                            Nivel Crítico Valorativo
                        </h1>
                        <div class="ui small form">
                            <div class="field">
                                <label><h4>¿Por qué crees que era importante para los egipcios que los obreros tuvieran un capataz?</h4></label>
                                <input readonly value="a. Porque cuando no eres vigilado, no realizas bien el trabajo." /><br><br>
                                <input readonly value="b. Porque es importante que alguien te guíe y oriente para realizar un buen trabajo." /><br><br>
                                <input readonly value="c. Porque no se puede confiar en gente del pueblo." /><br><br>
                                <input readonly value="d. Porque las construcciones eran lujosas y podían perderse cosas valiosas." />
                            </div>
                            <div class="field">
                                <label><h4>Los egipcios se dedicaban mucho a perfeccionar su arquitectura, ¿cuál sería el objetivo principal de esta dedicación y esfuerzo?</h4></label>
                                <input readonly value="a. Demostrar que eran superiores a las demás culturas." /><br><br>
                                <input readonly value="b. Demostrar su valoración por sus dioses y cultura." /><br><br>
                                <input readonly value="c. Demostrar sus riquezas a los demás pueblos." /><br><br>
                                <input readonly value="d. Emplear a los abundantes esclavos que tenían." />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="actions">
            <div class="ui right labeled green icon button" onclick="next()">
                <i class="right arrow icon"></i>
                Siguiente
            </div>
        </div>
    </div>

    <div class="ui basic modal" id="audio" tabindex="-1" aria-hidden="true">
        <div class="content">
            <audio style="width: inherit" controls>
                <source src="horse.ogg" type="audio/ogg">
            </audio>
        </div>
        <div class="actions">
            <h4 class="cancel" style="cursor: pointer">
                Cerrar
            </h4>
        </div>
    </div>

    <div class="ui modal" id="texto" tabindex="-1" aria-hidden="true">
        <div class="header">Conociendo el Antiguo Egipto</div>
        <div class="scrolling content">
        <div class="ui segment">
            <h2>Iniciando la travesía</h2>
                <img class="ui fluid image" src="{{asset('images/orus.png')}}" alt="">
                    <p>Vamos a ver si logro que descubras algo nuevo y acabas fascinado como todo aquel que se cerca a la historia del antiguo Egipto, que como verás es mucho más que pirámides. Lo que quiero decir es que, a la sombra de las pirámides, además de templos para los dioses, se alzaron ciudades para los hombres y aun hoy, todo está allí para sorprendernos.</p>
                    <p>Gracias a los arqueólogos y sus descubrimientos nos podemos hacer una idea de la forma de vida del pueblo egipcio. Los grandes faraones no fueron los únicos responsables de la civilización egipcia. De eso hay que echarle la culpa también a los navegantes, los constructores, los escritores, los músicos, los pintores, los guerreros, los sacerdotes, los campesinos, la gente sencilla que vivía en casas humildes construidas con ladrillos de barro y paja, que se alimentaban de las hortalizas que ellos mismos cultivaban aprovechando las crecidas del Nilo.</p>
                <img class="ui centered medium image" src="{{asset('images/imagen.png')}}" alt="">
                    <p>Me olvidaba por un momento de los médicos; ellos tenían remedio para todo, curaban un brazo roto con el mismo colirio que usaban para los ojos. También inventaron cosméticos para la piel y el cabello, lociones y ungüentos para evitar su caída, y en la eliminación de arrugas, unos verdaderos genios.</p>
                    <p>Las pirámides son uno de los monumentos más impresionantes que nos dejó el antiguo pueblo egipcio. Miles de obreros trabajaron durante años para construirlas. Por un tiempo se pensó que los obreros que trabajaban en la construcción de las pirámides eran esclavos, pero después se supo que el faraón contrataba campesinos en los meses en los que no había labor en el campo y que se les pagaba con sal, trigo y cebada. Estos campesinos llegaban a trabajar desde diferentes lugares de Egipto, por eso, se construían las ciudades de los obreros donde vivían hasta que volvían a sus casas. Estas ciudades contaban con servicios médicos donde se les atendía cuando tenían accidentes en el trabajo o enfermaban.</p>
                    <p>Los constructores tenían que estar muy bien organizados para trabajar en estas obras tan importantes y cada grupo de cuatro hombres tenía un capataz que se encargaba de guiarlos en el trabajo y de que no perdieran tiempo en sus jornadas. Había un sacerdote y sabio egipcio llamado Imhotep. Él es el primer arquitecto conocido de la historia del que se tiene constancia escrita y también el arquitecto e inventor de la pirámide escalonada de Sakkara, que parece ser la más antigua; esta fue construida para el faraón Djoser en el año 2750 antes de Cristo.</p>
            <h2>Las Pirámides</h2>
                    <p>Las pirámides Actualmente se conocen alrededor de diez de estas colosales construcciones. Muy cerca de El Cairo, en la llanura de Gizeh, hay un conjunto de pirámides entre las que se encuentra la más grande de todas con 146 metros de altura por 230 metros de ancho, que fue construida para el faraón Keops. En esta llanura está también la de Kefren, que parece más alta que la de Keops porque está construida en una zona de la llanura un poco más alta, pero que en realidad tiene diez metros menos.</p>
                    <p>Junto a ellas está la de Micerinos, más pequeña que las dos anteriores pero igual de impresionante. Ahora la pirámide de Keops está algo deteriorada, pero cuando fue construida estaba formada por dos millones de bloques de granito muy pesados, de un metro de altura, tan bien unidas entre sí, que era imposible introducir la hoja de un cuchillo entre ellas. La parte exterior estaba perfectamente alisada y pintada en franjas de diferentes colores; la parte de arriba era dorada.</p>
                <img class="ui fluid image" src="{{asset('images/piramides.png')}}" alt="">
                    <h2>La esfinge</h2>
                    <p>En la misma llanura de Gizeh, sobre una pequeña colina de roca, está esculpida la esfinge. Con 73 metros de largo y 20 metros de alto, tiene el cuerpo del león representando el poder y la fuerza física; y la cabeza del hombre para simbolizar la conciencia y la inteligencia.</p>
                    <p>Aunque la palabra esfinge en griego significa estrangulador, su origen está en la frase egipcia shesep-ankh, que quiere decir imagen viviente. La cabeza está esculpida en piedra más dura que el cuerpo y el paso del tiempo la ha erosionado menos, pero está muy estropeada ya que fue blanco de guerra en el siglo XVIII. Justo enfrente fue construido un templo dedicado al sol en sus tres fases: el amanecer, el mediodía y cuando se oculta en el horizonte, que no ha tenido tanta suerte como la esfinge y las pirámides, y está en ruinas.</p>
                <img class="ui centered large image" src="{{asset('images/esfinge.png')}}" alt="">
        </div>
    </div>

    <div class="ui tiny modal" id="textoPreguntas">
        <i class="close icon"></i>
        <div class="content">
            <div class="ui shape">
                <div class="sides">
                    <div class="active side">
                        <h1 class="ui dividing header" style="color: #00a3fb">
                            Nivel Literal
                        </h1>
                        <div class="ui small form">
                            <div class="field">
                                <label><h4>Además de las pirámides de Egipto, ¿qué se construyó a la sombra de ellas?</h4></label>
                                <input readonly value="a. Se construyeron acueductos." /><br><br>
                                <input readonly value="b. Se edificaron coliseos de entretenimiento." /><br><br>
                                <input readonly value="c. Se alzaron ciudades para los hombres." /><br><br>
                                <input readonly value="d. Se construyeron almacenes para guardar las cosechas." />
                            </div>
                            <div class="field">
                                <label><h4>Sobre los obreros que trabajaban en las piramides se puede afirmar que:</h4></label>
                                <input readonly value="a. Eran esclavos." /><br><br>
                                <input readonly value="b. Eran campesinos que contrataba el faraón en los meses en los que no habia labor en el campo." /><br><br>
                                <input readonly value="c. Llegaban desde muy lejos y vivían en la calles." /><br><br>
                                <input readonly value="d. No recibían ningún pago por el trabajo que realizaban." />
                            </div>
                        </div>
                    </div>
                    <div class="side">
                        <h1 class="ui dividing header" style="color: #00a3fb">
                            Nivel Inferencial
                        </h1>
                        <div class="ui small form">
                            <div class="field">
                                <label><h4>Además de las pirámides de Egipto, ¿qué se construyó a la sombra de ellas?</h4></label>
                                <input readonly value="a. Se construyeron acueductos." /><br><br>
                                <input readonly value="b. Se edificaron coliseos de entretenimiento." /><br><br>
                                <input readonly value="c. Se alzaron ciudades para los hombres." /><br><br>
                                <input readonly value="d. Se construyeron almacenes para guardar las cosechas." />
                            </div>
                            <div class="field">
                                <label><h4>Sobre los obreros que trabajaban en las piramides se puede afirmar que:</h4></label>
                                <input readonly value="a. Eran esclavos." /><br><br>
                                <input readonly value="b. Eran campesinos que contrataba el faraón en los meses en los que no habia labor en el campo." /><br><br>
                                <input readonly value="c. Llegaban desde muy lejos y vivían en la calles." /><br><br>
                                <input readonly value="d. No recibían ningún pago por el trabajo que realizaban." />
                            </div>
                        </div>
                    </div>
                    <div class="side">
                        <h1 class="ui dividing header" style="color: #00a3fb">
                            Nivel Crítico Valorativo
                        </h1>
                        <div class="ui small form">
                            <div class="field">
                                <label><h4>¿Por qué crees que era importante para los egipcios que los obreros tuvieran un capataz?</h4></label>
                                <input readonly value="a. Porque cuando no eres vigilado, no realizas bien el trabajo." /><br><br>
                                <input readonly value="b. Porque es importante que alguien te guíe y oriente para realizar un buen trabajo." /><br><br>
                                <input readonly value="c. Porque no se puede confiar en gente del pueblo." /><br><br>
                                <input readonly value="d. Porque las construcciones eran lujosas y podían perderse cosas valiosas." />
                            </div>
                            <div class="field">
                                <label><h4>Los egipcios se dedicaban mucho a perfeccionar su arquitectura, ¿cuál sería el objetivo principal de esta dedicación y esfuerzo?</h4></label>
                                <input readonly value="a. Demostrar que eran superiores a las demás culturas." /><br><br>
                                <input readonly value="b. Demostrar su valoración por sus dioses y cultura." /><br><br>
                                <input readonly value="c. Demostrar sus riquezas a los demás pueblos." /><br><br>
                                <input readonly value="d. Emplear a los abundantes esclavos que tenían." />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="actions">
            <div class="ui right labeled green icon button" onclick="next()">
                <i class="right arrow icon"></i>
                Siguiente
            </div>
        </div>
    </div>

    <div class="ui modal" id="produccion">
        <div class="header">La Momificación en el Antiguo Egipto</div>
        <div class="content">
            <div class="description">
                <p>Una infografía es un texto de fácil comprensión que utiliza imágenes o gráficos junto con textos escritos para proporcionar información acerca de lo que se desea comunicar. Cabe resaltar que el texto escrito que emplea una infografía es resumido, porque se complementa con las imágenes para brindar un rápido entendimiento del tema al lector.</p>
                <div class="ui equal width grid">
                    <div class="column">
                        <div class="ui header" style="color: #29b2fc">
                            Pasos para elaborar una infografía
                        </div>
                        <div class="ui list">
                            <div class="item">
                                <div class="content">
                                    <div class="header">Primer paso:</div>
                                    <div class="description">Planifica tu infografía.</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="content">
                                    <div class="header">Segundo paso:</div>
                                    <div class="description">Redacta tu infografía.</div>
                                </div>
                                <div class="ui bulleted list">
                                    <div class="item">Edita tu infografía en la Presentación final.</div>
                                    <div class="item">Publica tu infografía en esta plataforma.</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="content">
                                    <div class="header">Tercer paso:</div>
                                    <div class="description">Reflexiona sobre tu aprendizaje.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <img class="ui fluid image" src="{{asset('images/info.jpeg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@prepend('scripts')
<script>
    function openModal(data) {
        $('.ui.modal#' + data)
           .modal('show')
        ;
    }
</script>
<script>
    $('.shape').shape();
    function next() {
        $('.shape').shape('flip over');
    }
</script>
<script>
    function guardar(){
        classrooms = [];
        $("input:checkbox[name=classroom_checkbox]:checked").each(function() {
            classrooms.push($(this).val());
        });
        //alert(classrooms);
        $.ajax({
            type: "POST",
            url: "{{route('api_asignacion_lecturas')}}",
            dataType: "json",
            data: {
                "_token": "{{csrf_token()}}",
                "classrooms": classrooms.toString(),
                "id_reading": "{{$lectura->id_reading}}"
            },
            success: function(response) { 
                console.log(response); 
                showMessage('success', 'Lectura asignada correctamente');
            },
            error: function(e) {
                console.log(e); 
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
