<div>
    <section class="seccion-producto">
        <div class="detalle-producto">
          <div class="flechaizq-slice">
            <div wire:click="back({{$link_pre}})">
                <img
                  class="imgflechaizq btn-icon"
                  src="{{asset('theme/proanisrl/img/asset-comun/flechaizq.png')}}"
                  alt="flecha izq"
                />
            </div>
          </div>
          <div class="producto-slice">
            <img src="{{asset(str_replace('public/','','storage/'.$producto->img_producto))}}" alt="producto" />
          </div>
          <div class="flechader-slice">
            <div wire:click="next({{$link_pos}})">
                <img
                  class="imgflechader btn-icon"
                  src="{{asset('theme/proanisrl/img/asset-comun/flechaizq.png')}}"
                  alt="flecha der"
                />
            </a>
          </div>
        </div>
      </section>
      <section class="detalle-nutrientes">
        <div class="tabla-nutrientes" >
          <img style="margin: 0 auto;" src="{{asset(str_replace('public/','','storage/'.$producto->img_datos))}}" alt="tabla nutrientes">
        </div>
        <div class="descripcion">
          <p>
            {{$producto->descripcion}}
          </p>
        </div>
      </section>
</div>
