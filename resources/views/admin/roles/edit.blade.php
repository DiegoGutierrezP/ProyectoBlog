@extends('adminlte::page')

@section('title', 'Mi Blog')

@section('content_header')
    <h1>Editar Rol</h1>
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
            {!! Form::model($role, ['route'=>['admin.roles.update',$role], 'method'=>'PUT']) !!}

            @include('admin.roles.partials.form')

            {!! Form::submit('Editar Rol', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>
    </div>

@stop
