@extends('adminlte::page')

@section('title', 'Mi Blog')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')

    @if (session('msginfo'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('msginfo')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif

    {{-- laravel collective paquete instalado --}}
    <div class="card">
        <div class="card-body">
            {!! Form::model($category, ['route'=>['admin.categories.update',$category], 'method'=>'put']) !!} {{-- <form></form> --}}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de categoria']) !!}
                    @error('name')
                        <span class="text-danger ">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de categoria', 'readonly' => true]) !!}
                    @error('slug')
                        <span class="text-red ">{{$message}}</span>
                    @enderror
                </div>

                {!! Form::submit('Editar Categoria', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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
@stop
