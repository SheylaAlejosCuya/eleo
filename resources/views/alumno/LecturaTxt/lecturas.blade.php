<link rel="stylesheet" href="{{asset('css/lecturas.css')}}">
<div class="lecturaContainer">
    <div class="barraContainer">
        <div class="barra">
            {{-- <img src="{{asset('images/config.png')}}" alt="" width="25px">
            <img src="{{asset('images/lapiz.png')}}" alt="" width="25px">
            <img src="{{asset('images/diccionario.png')}}" alt="" width="25px">
            <img src="{{asset('images/sonido.png')}}" alt="" width="25px">
            <img src="{{asset('images/texto.png')}}" alt="" width="25px"> --}}
        </div>
    </div>
    <div class="cuento">
        <h1><strong>Conociendo el antiguo Egipto</strong></h1>
        <div class="texto">
            <p class="letra">
                {{-- <h2>Iniciando la travesía</h2>
                <img src="{{asset('images/orus.png')}}" alt="">
                Vamos a ver si logro que descubras algo nuevo y acabas fascinado como todo aquel que se acerca a la historia del antiguo Egipto, que como verás es mucho más que pirámides. Lo que quiero decir es que, a la sombra de las pirámides, además de templos para los dioses, se alzaron ciudades para los hombres y aun hoy, todo está allí para sorprendernos.
                <br>
                Gracias a los arqueólogos y sus descubrimientos nos podemos hacer una idea de la forma de vida del pueblo egipcio. Los grandes faraones no fueron los únicos responsables de la civilización egipcia. De eso hay que echarle la culpa también a los navegantes, los constructores, los escritores, los músicos, los pintores, los guerreros, los sacerdotes, los campesinos, la gente sencilla que vivía en casas humildes construidas con ladrillos de barro y paja, que se alimentaban de las hortalizas que ellos mismos cultivaban aprovechando las crecidas del Nilo.
                <br>
                <img src="{{asset('images/imagen.png')}}" alt="">
                <br>
                Me olvidaba por un momento de los médicos; ellos tenían remedio para todo, curaban un brazo roto con el mismo colirio que usaban para los ojos. También inventaron cosméticos para la piel y el cabello, lociones y ungüentos para evitar su caída, y en la eliminación de arrugas, unos verdaderos genios.  
                <br>
                Las pirámides son uno de los monumentos más impresionantes que nos dejó el antiguo pueblo egipcio. Miles de obreros trabajaron durante años para construirlas. Por un tiempo se pensó que los obreros que trabajaban en la construcción de las pirámides eran esclavos, pero después se supo que el faraón contrataba campesinos en los meses en los que no había labor en el campo y que se les pagaba con sal, trigo y cebada. Estos campesinos llegaban a trabajar desde diferentes lugares de Egipto, por eso, se construían las ciudades de los obreros donde vivían hasta que volvían a sus casas. Estas ciudades contaban con servicios médicos donde se les atendía cuando tenían accidentes en el trabajo o enfermaban.
                <br>
                Los constructores tenían que estar muy bien organizados para trabajar en estas obras tan importantes y cada grupo de cuatro hombres tenía un capataz que se encargaba de guiarlos en el trabajo y de que no perdieran tiempo en sus jornadas. 
                <br>
                <br>
                <h2>Las Pirámides</h2>
                Actualmente se conocen alrededor de diez de estas colosales construcciones. Muy cerca de El Cairo, en la llanura de Gizeh, hay un conjunto de pirámides entre las que se encuentra la más grande de todas con 146 metros de altura por 230 metros de ancho, que fue construida para el faraón Keops. En esta llanura está también la de Kefren, que parece más alta que la de Keops porque está construida en una zona de la llanura un poco más alta, pero que en realidad tiene diez metros menos. 
                <br>
                Junto a ellas está la de Micerinos, más pequeña que las dos anteriores, pero igual de impresionante. Ahora la pirámide de Keops está algo deteriorada, pero cuando fue construida estaba formada por dos millones de bloques de granito muy pesados, de un metro de altura, tan bien unidas entre sí, que era imposible introducir la hoja de un cuchillo entre ellas. La parte exterior estaba perfectamente alisada y pintada en franjas de diferentes colores; la parte de arriba era dorada..
                <img src="{{asset('images/piramides.png')}}" alt="">
                <br>
                <br>
                <h2>La Esfinge</h2>
                En la misma llanura de Gizeh, sobre una pequeña colina de roca, está esculpida la esfinge. Con 73 metros de largo y 20 metros de alto, tiene el cuerpo del león representando el poder y la fuerza física; y la cabeza del hombre para simbolizar la conciencia y la inteligencia.
                <br>
                Aunque la palabra esfinge en griego significa estrangulador, su origen está en la frase egipcia shesep-ankh, que quiere decir imagen viviente. La cabeza está esculpida en piedra más dura que el cuerpo y el paso del tiempo la ha erosionado menos, pero está muy estropeada ya que fue blanco de guerra en el siglo XVIII. Justo enfrente fue construido un templo dedicado al sol en sus tres fases: el amanecer, el mediodía y cuando se oculta en el horizonte, que no ha tenido tanta suerte como la esfinge y las pirámides, y está en ruinas.
                <br>
                <img src="{{asset('images/esfinge.png')}}" alt=""> --}}
            </p>
        </div>
    </div>
    <a href="{{route('web_video_preguntas4', ['id'=>$lectura->id_reading])}}"><button class="cancelButton">Regresar</button></a>
    <button class="saveButton" hidden>Verifica</button>
    <a href="{{route('web_texto_preguntas1', ['id_reading'=>$lectura->id_reading])}}"><button class="saveButton" style="float: right; margin-top: 16px">Avanza</button></a>
    </br>
    </br>
    </br>
    </br>
</div>