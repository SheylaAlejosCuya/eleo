<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment eight wide column">
        <h3>3. Adivina ¿Cuál es el verdadero nombre de esta estatua en forma de Perrito? Marca con una X</h3>
        <div class="ui vertical segment">
            <div class="ui two column grid">
                <div class="column">
                    <img class="ui fluid image" src="{{asset('images/flores.png')}}" alt="">
                </div>
                <div class="column" style="display: flex; flex-direction: column; justify-content: space-around;">
                    <div class="row">
                        <button onClick="selectOption(this)" id="1" class="fluid ui basic grey button"><i class="times green icon" style="display: none"></i>Pipo</button>
                    </div>
                    <div class="row">
                        <button onClick="selectOption(this)" id="2" class="fluid ui basic grey button"><i class="times green icon" style="display: none"></i>Popi</button>
                    </div>
                    <div class="row">
                        <button onClick="selectOption(this)" id="3" class="fluid ui basic grey button"><i class="times green icon" style="display: none"></i>Pupi</button>
                    </div>
                    <div class="row">
                        <button onClick="selectOption(this)" id="4" class="fluid ui basic grey button"><i class="times green icon" style="display: none"></i>Pepi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let selectedOption = null;
    function selectOption(e) {
        e.children[0].style.display = "inline-flex";
        e.className = "fluid ui basic green button";
        if (selectedOption === e) {
            return
        }
        if (selectedOption != null) {
            selectedOption.children[0].style.display = "none";
            selectedOption.className = "fluid ui basic gray button";
        }
        selectedOption = e;
        console.log("seleccionado: " + selectedOption.id);
    }
</script>