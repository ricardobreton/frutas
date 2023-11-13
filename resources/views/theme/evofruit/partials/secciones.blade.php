<section class="mt-5">
    @php
        $imagenSection = $seccion->imagenes($seccion->seccion)->first();
    @endphp
    @if (!is_null($imagenSection))
    <div class="datos-imagen">
        <img src="{{Storage::url($imagenSection->url)}}" alt="img {{$alcaldia->nombre}}">
    </div>
    @endif
    <div class="datos-seccion">
        {!! $seccion->contenido !!}
    </div>
</section>
