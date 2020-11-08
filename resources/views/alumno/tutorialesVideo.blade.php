<div class="infomacion">
    <h1><strong>Demo {{$tutorialID}}</strong></h1>    
    <div class="tutorialesVideo">
        <div class="c-video">
            <video class="evideo">
                <source src="{{asset('videos/pato-caminando-con-estilo.mp4')}}" type="video/mp4">
            </video>
            <div class="evideocontrols">
                <div class="evideobar" id="ebar">
                    <div class="evideobarposition"></div>
                </div>
                <div class="evideobuttons">
                    <i class="far fa-play-circle" id="play-pause"></i>
                    <i class="fas fa-compress" id="fullscreenTrigger"></i>
                </div>
            </div>
        </div>
    </div>
</div>
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
            console.log("play");
            btn.className = 'far fa-pause-circle';
            video.play();
        } else {
            console.log("pause");
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