<link rel="stylesheet" href="{{asset('css/tutoriales.css')}}">
<div class="infomacion">
        <h1><strong>Tutoriales</strong></h1>
        <div class="tutorialVideos">
            <a href="tutoriales/1" class="tutorialVideo" onClick="selectTutorial()">
                <i class="far fa-play-circle"></i>
                <div>Demo 1</div>
            </a>
            <a href="tutoriales/2" class="tutorialVideo" onClick="selectTutorial()">
                <i class="far fa-play-circle"></i>
                <div>Demo 2</div>
            </a>
            <a href="tutoriales/3" class="tutorialVideo" onClick="selectTutorial()">
                <i class="far fa-play-circle"></i>
                <div>Demo 3</div>
            </a>
            <a href="tutoriales/4" class="tutorialVideo" onClick="selectTutorial()">
                <i class="far fa-play-circle"></i>
                <div>Demo 4</div>
            </a>
        </div>
</div>
<script>
    function selectTutorial() {
        console.log("clicked");
    }
</script>