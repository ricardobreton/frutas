<main class="contenedor mt-5">
    <div class="content-box-container">
        @foreach ($alcaldias as $alcaldia)
        <div class="content-box">
            @php
                // dd($alcaldia->imagenes('index')->first());
                $img = $alcaldia->imagenes('index')->first();//$alcaldia->image->imagenesTipo('index')->first();
            @endphp
                @if (!is_null($img))
                    <img src="{{Storage::url($img->url)}}" alt="img {{$alcaldia->nombre}}">
                @else
                    <img src="https://cdn.pixabay.com/photo/2016/07/07/15/35/puppy-1502565_1280.jpg" alt="img post">
                @endif
            <div class="capa-box">
                <p> <a href="{{route('alcaldia.show', ['alcaldia' => $alcaldia->nombre])}}">{{$alcaldia->nombre}}</a> </p>
            </div>
        </div>
        @endforeach
    </div>
</main>
