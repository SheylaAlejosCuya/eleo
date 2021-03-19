<div class="ui stackable centered grid" style="margin: 16px 32px!important">
    <div class="ui segment column">
        <h3 class="ui header">1. Relaciona la información de cada texto con los mosaicos que les corresponden. Arrastra los mosaicos sobre el texto.</h3>
        <div class="ui six column centered doubling grid">
            <?php
                foreach ($ddData as $option) {
                    if ($option['type'] === 0) {
                        ?>
                            <div class="column">
                                <div class="ui green segment dd_option" draggable="true" data-value="{{$option['value']}}" data-type="{{$option['type']}}">
                                    <img class="ui fluid rounded image" src="{{$option['img']}}" alt="" draggable="false">
                                </div>
                            </div>
                        <?php
                    } else {
                        ?>
                            <div class="column">
                                <div class="ui orange segment dd_option" draggable="true" data-value="{{$option['value']}}" data-type="{{$option['type']}}">
                                    {{$option['text']}}
                                </div>
                            </div>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</div>
<script>
    var dd_options = document.getElementsByClassName("dd_option");
    for (var i = 0; i < dd_options.length; i++) {
        var dd_option = dd_options[i];
        dd_option.addEventListener('dragstart', dragStart, false);
        dd_option.addEventListener('dragend', dragEnd, false);
        dd_option.addEventListener('dragover', dragOver, false);
        dd_option.addEventListener('dragleave', dragLeave, false);
        dd_option.addEventListener('drop', drop, false);
    }

    var dragged;
    
    function dragStart(e) {
        dragged = this;
        console.log("moving: " + this.getAttribute('data-value') + " " + this.getAttribute('data-type'))
    }

    function dragEnd(e) {
        console.log("stop moving: " + this.getAttribute('data-value') + " " + this.getAttribute('data-type'))
    }

    function dragOver(e) {
        event.preventDefault();
        if (dragged.getAttribute('data-type') != this.getAttribute('data-type')) {
            this.style.transform = "scale(1.1)"
        }
    }

    function dragLeave(e) {
        this.style.transform = "scale(1)"
        console.log("leaving: " + this.getAttribute('data-value') + " " + this.getAttribute('data-type'))
    }

    function drop(e) {
        this.style.transform = "scale(1)"
        if (this.parentElement.childElementCount === 2) {
            return
        }
        if (dragged.getAttribute('data-type') === this.getAttribute('data-type')) {
            return
        }
        var dragged_column = dragged.parentElement;
        this.setAttribute('draggable', false)
        dragged.setAttribute('draggable', false)
        this.parentElement.appendChild(dragged)
        dragged_column.remove();
        console.log(this.parentElement.childElementCount);
    }

</script>