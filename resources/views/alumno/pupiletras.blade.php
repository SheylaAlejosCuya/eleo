<link rel="stylesheet" href="{{asset('css/pupiletras.css')}}">
<script type="text/javascript" src="{{asset('dist/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dist/js/wordfind.js')}}"></script>
<script type="text/javascript" src="{{asset('dist/js/wordfindgame.js')}}"></script>
<script type="text/javascript" src="{{asset('dist/js/tag-it.js')}}"></script>
<div class="infomacion">
    <h4>{{$subtitle}}</h4>

    <div class="pupiletrasContainer">
        <div class="pupiletrasInfo">
            <div class="pupiletrasTitle">Clave de respuesta</div>
            <div id='Palabras'></div>
            <div class="pupiletrasRestantes">Palabras restantes: 5</div>
        </div>
        <div id='juego'></div>
    </div>

    <div class="container">
        <div class="row">
            <script type="text/javascript">
                $(document).ready(function() {
                    Crear();
                });
            </script>

        
            <!-- controlar la sopa de letras -->
            <script>
                var palabras = [];
                var juego;

                function Crear() {
                    // Tomar las palabras de la lista e introducurlas en un array
                    datos = ["bosque" ,"caperucita", "roja", "abuelita", "lobo", "feroz", "leñador"];
                    for (i = 0; i < (datos.length) - 1; i++) {
                        palabras.push(datos[i]);
                    }

                    $('#Juegos').show();
                    /*
                      se esta indicando que en el contenedor con el id juego se va a mostrar la sopa de letras
                      y el contenedor con el id palabras va a mostrar las palabras a buscar
                    */
                    juego = wordfindgame.create(datos, '#juego', '#Palabras');
                    // Estructura de la sopa de letras
                    var puzzle = wordfind.newPuzzle(datos, {
                        height: 18,
                        width: 18,
                        fillBlanks: false
                    });
                }
                $('#solve').click(function() {
                    wordfindgame.solve(juego, palabras);
                });
            </script>
</div>