<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre del post']) !!}
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
    @error('slug')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Categoría') !!}
    {!! Form::select('category_id', $categories, null, ['class'=>'form-control', 'placeholder'=>'Seleccione una categoría']) !!}
    @error('category_id')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>
    @foreach ($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{$tag->name}}
        </label>
    @endforeach
    @error('tags')
        <br>
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    <label class="mr-2">
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label class="mr-2">
    <label>
        {!! Form::radio('status', 2 ) !!}
        Publicado
    </label>
    <hr>
    @error('status')
        <br>
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($post->image)
                <img id="picture" src="{{Storage::url($post->image->url)}}" alt="imagen post">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2016/07/07/15/35/puppy-1502565_1280.jpg" alt="img de prueba">
            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrara en el post') !!}
            {!! Form::file('file', ['class'=>'form-control-file', 'accept'=> 'image/*']) !!}
        </div>
        @error('file')
            <span class="text-danger">{{$message}}</span>
        @enderror
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla perferendis vel, dolor libero minus sint molestias debitis, voluptates provident perspiciatis veritatis reprehenderit sapiente saepe, quisquam laudantium commodi consequuntur ducimus voluptatibus.</p>
    </div>
</div>
<div class="form-group">
    {!! Form::label('extract', 'Extracto:') !!}
    {!! Form::textarea('extract', null, ['class'=>'form-control']) !!}
    {{-- <x-adminlte-text-editor name="extract" :config="$configEditor">
        {{ old('extract', $post->extract ?? '') }}
    </x-adminlte-text-editor> --}}
    @error('extract')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('body', 'Cuerpo del post:') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    {{-- <x-adminlte-text-editor name="body" :config="$configEditor">
        {{ old('body', $post->body ?? '') }}
    </x-adminlte-text-editor> --}}
    @error('body')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
