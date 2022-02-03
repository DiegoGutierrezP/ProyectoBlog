<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name',null, ['class'=> 'form-control','placeholder'=>'Ingrese el nombre del post','autocomplete'=>'off']) !!}
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug',null, ['class'=> 'form-control','placeholder'=>'Ingrese el slug del post','readonly']) !!}
    @error('slug')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('category_id',$categories,null, ['class'=> 'form-control']) !!}
    @error('category')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <p><b>Etiquetas</b></p>
    @foreach ($tags as $tag)
        <label class="form-check">
            {{-- definimos una varaible array llamado tags[] para q el usuario pueda escoger mas de una etiqueta --}}
            {!! Form::checkbox('tags[]', $tag->id, null, ['class'=>'form-check-input']) !!}
            {{$tag->name}}
        </label>
    @endforeach
    @error('tags')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <p><b>Estado</b></p>
    <label class="mr-3">
        {!! Form::radio('status', '1', true) !!}
        Borrador
    </label>
    <label >
        {!! Form::radio('status', '2', null) !!}
        Publicado
    </label>

</div>

<div class="row mb-3">
    <div class="col-md-6">
        <div class="image-wrapper">
            {{-- @if (isset($post))
                @if ($post->image)
                     <img id="picture" src="{{Storage::url($post->image->url)}}">
                @else
                    <img id="picture" src="https://cdn.pixabay.com/photo/2021/12/22/16/50/landscape-6887936_960_720.jpg">
                @endif
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2021/12/22/16/50/landscape-6887936_960_720.jpg">
            @endif --}}
            @isset ($post->image)
                <img id="picture" src="{{Storage::url($post->image->url)}}">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2021/12/22/16/50/landscape-6887936_960_720.jpg">
            @endisset
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrara en el post') !!}
            {!! Form::file('file', ['class'=>'form-control-file','accept' => 'image/*']) !!}
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus nisi velit libero!
             Veniam sequi asperiores tempore quia nesciunt quis suscipit laudantium voluptate totam,
              neque optio, cum, repellendus corrupti id aliquam?
              @error('file')
                  <small class="text-danger">{{$message}}</small>
              @enderror
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Extracto') !!}
    @error('extract')
        <small class="text-danger">{{$message}}</small>
    @enderror
    {!! Form::textarea('extract', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Cuerpo del post') !!}
    @error('body')
        <small class="text-danger">{{$message}}</small>
    @enderror
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>
