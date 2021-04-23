<link rel="stylesheet" href="{{asset('css/resultados.css')}}">
<div class="infomacion">
    <br>
    <div class="eresultados row">
        <div class="eresultados__left col-lg">
            <x-result-progress-bar title="COMPRENSIÓN AUDITIVA" :results="$aresults" />
            <x-result-progress-bar title="COMPRENSIÓN LECTORA" :results="$lresults" />
            <x-result-progress-bar title="PRODUCCIÓN DE TEXTOS" :results="$tresults" />
        </div>
            <div class="eresultadosCards col-lg">
                <div class="eresultadosCard">
                    <div class="eresultadosCard__left">
                        <img src="{{asset('images/gorro.png')}}" alt="">
                    </div>
                    <div class="eresultadosCard__right">
                        <div class="ecardText">
                            <p><b>Comprensión Auditiva</b></p>
                            <p hidden>¡Haz completado 10 lecturas!</p>
                        </div>
                    </div>
                </div>
                <div class="eresultadosCard">
                    <div class="eresultadosCard__left">
                        <img src="{{asset('images/gorro.png')}}" alt="">
                    </div>
                    <div class="eresultadosCard__right">
                        <div class="ecardText">
                            <p><b>Comprensión Lectora</b></p>
                            <p hidden>¡Haz completado 10 lecturas!</p>
                        </div>
                    </div>
                </div>
                <div class="eresultadosCard">
                    <div class="eresultadosCard__left">
                        <img src="{{asset('images/gorro.png')}}" alt="">
                    </div>
                    <div class="eresultadosCard__right">
                        <div class="ecardText">
                            <p><b>Producción de Textos</b></p>
                            <p hidden>¡Haz completado 10 lecturas!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>