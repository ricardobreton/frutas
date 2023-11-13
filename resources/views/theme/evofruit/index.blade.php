@extends('theme.evofruit.master')

@section('title', 'Home Fruit')

@section('body')

<!-- LOADER -->
{{-- <div id="preloader">
    <div class="loader">
        <img src="{{asset('theme/evofruit/img/loader.gif')}}" alt="#" />
    </div>
</div> --}}
<!-- END LOADER -->
<!-- Start header -->
@include('theme.evofruit.partials.headers.header')
<!-- End header -->

<!-- Start main -->
@include('theme.evofruit.partials.main')
<!-- End main -->

<!-- Start header -->
@include('theme.evofruit.partials.footers.footer')
<!-- End header -->

@endsection


@section('custom_js')
<script>
    // $(document).ready(function(){
    //     $("#contacto").trigger('click');
    //     console.log('cliente en contacto');
    // })
</script>
@endsection
