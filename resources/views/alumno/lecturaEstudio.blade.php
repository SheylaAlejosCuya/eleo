<link rel="stylesheet" href="{{asset('css/resultados.css')}}">
<div class="infomacion">
    <br>
    <div class="eresultados">
        <div class="eresultados__left">
            <x-result-progress-bar title="COMPRENSION AUDITIVA" :results="$aresults" />
            <x-result-progress-bar title="COMPRENSION LECTORA" :results="$lresults" />
            <x-result-progress-bar title="COMPRENSION DE TEXTOS" :results="$tresults" />
        </div>
        <div class="eresultados__right">
            <div class="enotas">Line Graph</div>
            <div class="eresultadosCards">
                <div class="eresultadosCard">
                    <div class="eresultadosCard__left">
                        <img src="{{asset('images/gorro.png')}}" alt="">
                        100%
                    </div>
                    <div class="eresultadosCard__right">
                        <div class="ecardText">
                            <p><b>Comprensión Lectora</b></p>
                            <p>¡Haz completado 10 lecturas!</p>
                        </div>
                    </div>
                </div>
                <div class="eresultadosCard">
                    <div class="eresultadosCard__left">
                        <img src="{{asset('images/gorro.png')}}" alt="">
                        100%
                    </div>
                    <div class="eresultadosCard__right">
                        <div class="ecardText">
                            <p><b>Comprensión Lectora</b></p>
                            <p>¡Haz completado 10 lecturas!</p>
                        </div>
                    </div>
                </div>
                <div class="eresultadosCard">
                    <div class="eresultadosCard__left">
                        <img src="{{asset('images/gorro.png')}}" alt="">
                        100%
                    </div>
                    <div class="eresultadosCard__right">
                        <div class="ecardText">
                            <p><b>Comprensión Lectora</b></p>
                            <p>¡Haz completado 10 lecturas!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>