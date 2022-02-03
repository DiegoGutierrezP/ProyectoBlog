@extends('adminlte::page')

@section('title', 'Mi Blog')

@section('content_header')
    <h1>Crear Etiqueta</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::open(['route'=>'admin.tags.store']) !!}
                {{-- <div class="form-group">
                    {!! Form::label('name', 'Nombre: ') !!}
                    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre de la etiqueta']) !!}
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Slug: ') !!}
                    {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Ingrese el slug de la etiqueta','readonly']) !!}
                    @error('slug')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('color', 'Color: ') !!}
                    {!! Form::select('color',$colors, 'pink', ['class' => 'form-control']) !!}
                    @error('color')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div> --}}

                @include('admin.tags.partials.form')

                {!! Form::submit('Crear Etiqueta', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('js')
    {{-- indicar direccion desde la carpeta public --}}
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        })
    </script>

@endsection
