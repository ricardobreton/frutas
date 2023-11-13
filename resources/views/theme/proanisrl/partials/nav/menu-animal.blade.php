<section>
    <div class="slider" style="padding-top: 10rem">
        <div class="alto_icon_animal slider_icon">

            @foreach ($menu as $item)

                    @if ($item->name_ruta == 'generico')
                        {{-- enlaces genericos --}}
                        @if ($item->usar_icono)
                        <a href="{{route($item->name_ruta,[$item->nombre])}}">
                            <div class="btn-icon icon_nav">
                                <img src="{{asset(Storage::url($item->icono))}}">
                            </div>
                        </a>
                        @else
                        <a href="{{route($item->name_ruta,[$item->nombre])}}">
                            <div class="btn-icon icon_nav">
                                {!!$item->codigo_svg!!}
                            </div>
                        </a>
                        @endif
                    @else
                        {{-- enlaces prediseñadas --}}
                        @if ($item->usar_icono)
                        <a href="{{route($item->name_ruta)}}">
                            <div class="btn-icon icon_nav">
                                <img src="{{asset(Storage::url($item->icono))}}">
                            </div>
                        </a>
                        @else
                        <a href="{{route($item->name_ruta)}}">
                            <div style="margin: 0 2.5rem">
                                {!!$item->codigo_svg!!}
                            </div>
                        </a>
                        @endif
                    @endif
            @endforeach

        </div>
    </div>
</section>
