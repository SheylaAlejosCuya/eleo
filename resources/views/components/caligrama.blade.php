<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment ten wide column">
        <h3>2. Coloca dentro de los globos sobre qué estarían hablando, pues desean ir a jugar a la rampa de La Molina</h3>
        <div class="ui fluid input">
            <input id="inputC" type="text" placeholder="Texto...">
        </div>
        <svg viewBox="{{$caligramaData['vb']}}">
            <path id="curve"
                d="{{$caligramaData['d']}}">
            </path>
            <text x="0" y="500" font-size="{{$caligramaData['fs']}}">
                <textPath id="tpc" xlink:href="#curve" >
                    
                </textPath>
            </text>
        </svg>
    </div>
</div>
<script>
    const inputC = document.getElementById('inputC');
    const tpc = document.getElementById('tpc');
    inputC.addEventListener('keyup', updateT);
    function updateT(e) {
        tpc.textContent = e.target.value;
        console.log(e.target.value);
    }
</script>
