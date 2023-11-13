<div>
    @php
        if(is_null($ruta_flecha))
        {
            $ruta_flecha = 'theme/proanisrl/img/asset-comun/flechaizq.png';
        }
    @endphp
    <div class="producto-descripcion">
        <p class="{{($classTitulo != '')?$classTitulo:'texto-peces'}}">{{$producto->descripcion}}</p>
    </div>
    <div class="detalle-producto">
        <div class="flechaizq-slice">
            <div wire:click="back({{$link_pre}})">
                <img
                  class="imgflechaizq btn-icon"
                  src="{{asset($ruta_flecha)}}"
                  alt="flecha izq"
                />
            </div>
        </div>
        <div class="producto-slice-50">
          <img src="{{asset(str_replace('public/','','storage/'.$producto->img_producto))}}" alt="producto" />
        </div>
        <div class="flechader-slice">
            <div wire:click="next({{$link_pos}})">
                <img
                  class="imgflechader btn-icon"
                  src="{{asset($ruta_flecha)}}"
                  alt="flecha der"
                />
            </div>
        </div>
      </div>
</div>
