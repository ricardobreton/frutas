@if ($videos)
<section id="videos" class="contenedor mt-5">
    <h2>Videos</h2>
    <div class="videos tbl-scroll">
        @foreach ($videos as $video)
        <div class="video">
            <iframe width="560" height="315" src="{{$video->ruta}}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
        @endforeach
    </div>
</section>
@endif
