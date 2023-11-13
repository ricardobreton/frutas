<section class="reproductor">
    <div class="player">
        <video id="video" src="{{asset('theme/proanisrl/video/video_proani.mp4')}}" width="400"
            poster="{{asset('theme/proanisrl/img/btn_video/preview_video.jpg')}}"></video>
        <div class="player-overlay">
            <h2 class="player-title">Instalaciones de Proani</h2>
            <div class="player-actions">
                <button class="button" id="backward" aria-label="Retroceder 10 seg."
                    title="Retroceder 10 seg."></button>
                <button class="button" id="play" aria-label="Reproducir" title="Reproducir"></button>
                <button class="button" hidden id="pause" aria-label="Pausa" title="Pausa"></button>
                <button class="button" id="forward" aria-label="Adelantar 10 seg." title="Adelantar 10 seg."></button>
            </div>
            <div class="player-progress">
                <input type="range" min="0" step="1" value="0" id="progress">
            </div>
        </div>
    </div>
</section>
