@extends('adminlte::page')

@section('title', 'Mi Blog')

@section('content_header')
    <h1>Editar Etiqueta</h1>
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

    <div class="card">
        <div class="card-body">
            {!! Form::model($tag, ['route'=>['admin.tags.update',$tag], 'method'=>'put' ]) !!}

            @include('admin.tags.partials.form')

            {!! Form::submit('Editar etiqueta', ['class' => 'btn btn-primary']) !!}

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
@stop
