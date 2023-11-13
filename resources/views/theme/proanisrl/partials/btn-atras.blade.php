<section class="contenedor-btn">
    <a class="{{isset($ancla_atras)?$ancla_atras:'ancla_sec'}}" href="{{url()->previous()}}">
        <div class="btn-volver">
            <span>Volver</span>
            <svg id="{{isset($btn_icon_white)?$btn_icon_white:'btn-atras'}}" width="32" height="32" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M29.333 16c0-7.352-5.981-13.333-13.333-13.333a13.259 13.259 0 00-9.414 3.919l-3.92-3.92V12H12L8.466 8.466A10.62 10.62 0 0116 5.333c5.881 0 10.667 4.786 10.667 10.667S21.88 26.667 16 26.667 5.333 21.88 5.333 16H2.667c0 7.352 5.981 13.333 13.333 13.333S29.333 23.352 29.333 16z"/></svg>
        </div>
    </a>
</section>
