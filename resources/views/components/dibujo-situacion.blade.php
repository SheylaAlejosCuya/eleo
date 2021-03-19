<link rel="stylesheet" href="{{asset('css/painting.css')}}">
<div style="margin: 32px">
    <h3>2. En la vida existen situaciones que ocasionan miedo. Escribe y dibuja una situación que te haya causado miedo.</h3>
    <div class="field" style="text-align: center">
        <div class="ui form">
            <div class="field">
                <label>Descripción de la Situación</label>
                <textarea rows="6"></textarea>
            </div>
        </div>
        <br>
        <canvas id="canvas"></canvas>
        <div class="tools">
            <button onClick="undo_last()" type="button" class="button">Undo</button>
            <button onClick="clear_canvas()" type="button" class="button">Clear</button>

            <div onClick="change_color(this)" class="color-field" style="background: red;"></div>
            <div onClick="change_color(this)" class="color-field" style="background: blue;"></div>
            <div onClick="change_color(this)" class="color-field" style="background: green;"></div>
            <div onClick="change_color(this)" class="color-field" style="background: yellow;"></div>

            <input onInput="draw_color = this.value" type="color" class="color-picker">
            <input type="range" min="1" max="100" class="pen-range" onInput="draw_width = this.value" value="10">
        </div>
    </div>
</div>

<script>
    const canvas = document.getElementById("canvas");
    if (window.innerWidth >= 1120) {
        canvas.width = (0.8419 * window.innerWidth - 64) / 2;
    } else if (window.innerWidth > 768) {
        canvas.width = (0.8419 * window.innerWidth - 64) / 1.5;
    } else {
        canvas.width = 0.8419 * window.innerWidth - 64;
    }
    canvas.height = canvas.width * 0.3623;

    let context = canvas.getContext("2d");
    let start_background_color = "white";
    context.fillStyle = start_background_color;
    context.fillRect(0, 0, canvas.width, canvas.height);

    let draw_color = "black";
    let draw_width = "2";
    let is_drawing = false;

    let restore_array = [];
    let index = -1;

    function change_color(element) {
        draw_color = element.style.background;
    }

    canvas.addEventListener("touchstart", start, false);
    canvas.addEventListener("touchmove", draw, false);
    canvas.addEventListener("mousedown", start, false);
    canvas.addEventListener("mousemove", draw, false);

    canvas.addEventListener("touchend", stop, false);
    canvas.addEventListener("mouseup", stop, false);
    canvas.addEventListener("mouseout", stop, false);

    function start(event) {
        is_drawing = true;
        context.beginPath();
        context.moveTo(event.clientX - canvas.offsetLeft, event.clientY - canvas.offsetTop);
        event.preventDefault();
    }

    function draw(event) {
        if (is_drawing) {
            context.lineTo(event.clientX - canvas.offsetLeft, event.clientY - canvas.offsetTop);
            context.strokeStyle = draw_color;
            context.lineWidth = draw_width;
            context.lineCap = "round";
            context.lineJoin = "round";
            context.stroke();
        }
    }

    function stop(event) {
        if (is_drawing) {
            context.stroke();
            context.closePath();
            is_drawing = false;
        }
        event.preventDefault();

        if (event.type != 'mouseout') {
            restore_array.push(context.getImageData(0, 0, canvas.width, canvas.height));
            index += 1;
        }

    }

    function clear_canvas() {
        context.fillStyle = start_background_color;
        context.clearRect(0, 0, canvas.width, canvas.height);
        context.fillRect(0, 0, canvas.width, canvas.height);
        
        restore_array = [];
        index = -1;
        setImage();
    }

    function undo_last() {
        if (index <= 0) {
            clear_canvas();
        } else {
            index -= 1;
            restore_array.pop();
            context.putImageData(restore_array[index], 0, 0);
        }
    }
</script>

