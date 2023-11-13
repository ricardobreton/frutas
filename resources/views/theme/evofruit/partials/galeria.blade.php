<section id="galeria" class="contenedor mt-5">
    <h2>Galería</h2>
    <div class="galeria">
        @foreach ($galeria as $foto)
            <div class="imagen">
                {{-- <img src="{{asset('theme/rbjevo/img/imagen_1.jpg')}}" alt="Imagen Galeria" /> --}}
                <img src="{{Storage::url($foto->url)}}" alt="Imagen Galeria">
            </div>
        @endforeach
    </div>
</section>
