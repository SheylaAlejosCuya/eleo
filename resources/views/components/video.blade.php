<div class="c-video">
    <video 
        id="my-video"
        class="video-js evideo"
        controls
        preload="auto"
        width="720"
        height="480"
        poster="MY_VIDEO_POSTER.jpg"
        data-setup="{}" >
        <source src="{{asset("$lectura->video")}}" type="video/mp4">
    </video>
    <div class="evideocontrols" hidden>
        <div class="evideocontrols__left">
            <div class="playButton">
                <i class="far fa-play-circle" id="play-pause"></i>
            </div>
        </div>
        <div class="evideocontrols__right">
            <div class="ebar">
                <div class="evideobar" id="ebar">
                    <div class="evideobarposition"></div>
                </div>
            </div>
            <i class="fas fa-compress" id="fullscreenTrigger"></i>
        </div>
    </div>
</div>
<button class="saveButton" style="margin-top: 16px; float: right; z-index: 2; display: none;" id="continueButton"><a href="{{route($continue, ['id'=>$lectura->id_reading])}}">Siguiente</a></button>
<script>
    var video = document.querySelector('.evideo');
    var videobar = document.getElementById('ebar');
    var position = document.querySelector('.evideobarposition');
    var btn = document.getElementById('play-pause');
    var fullscreenTrigger = document.getElementById('fullscreenTrigger');

    fullscreenTrigger.onclick = function() {
        if (video.requestFullscreen) {
            video.requestFullscreen();
        } else if (video.webkitRequestFullscreen) { /* Safari */
            video.webkitRequestFullscreen();
        } else if (video.msRequestFullscreen) { /* IE11 */
            video.msRequestFullscreen();
        }
    }

    function togglePlayPause() {
        if (video.paused) {
            btn.className = 'far fa-pause-circle';
            video.play();
        } else {
            btn.className = 'far fa-play-circle';
            video.pause();
        }
    }
    btn.onclick = function() {
        togglePlayPause();
    }
    video.addEventListener('timeupdate', function() {
        var pos = video.currentTime / video.duration;
        position.style.width = pos * 100 + '%';
        if (video.ended) {
            <?php
                if ($continue !== '') {
                    ?>
                        var continueButton = document.getElementById('continueButton');
                        continueButton.style.display = 'unset';
                    <?php
                }    
            ?>
            btn.className = 'far fa-play-circle';
        }
    })
    document.addEventListener('keydown', function(event) {
        if (event.keyCode == 32) {
            if (video.paused) {
                console.log("play");
                btn.className = 'far fa-pause-circle';
                video.play();
            } else {
                console.log("pause");
                btn.className = 'far fa-play-circle';
                video.pause();
            }
        }
        else if (event.keyCode == 37) {
            video.currentTime = video.currentTime - 5;
        }
        else if (event.keyCode == 39) {
            video.currentTime = video.currentTime + 5;
        }
        else if (event.keyCode >= 96 && event.keyCode <= 105) {
            video.currentTime = ((event.keyCode - 96)/10) * video.duration;
        }
    }, true);
    videobar.onclick = function(event) {
        var rect = videobar.getBoundingClientRect();
        video.currentTime = ((event.pageX - rect.x) / rect.width) * video.duration;
    }
</script>