@extends('adminlte::page')

@section('title', 'Mi Blog')

@section('content_header')
    <h1>Asignar un rol</h1>
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
            <p class="h5">Nombre:</p>
            <p class="form-control">{{$user->name}}</p>

            {!! Form::model($user,['route' => ['admin.users.update',$user], 'method'=>'put']) !!}

            <h2 class="h5 mb-3"> Listado de Roles</h2>

            @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                        {{$role->name}}
                    </label>
                </div>
            @endforeach
            @error('roles')
                <small class="text-danger">{{$message}}</small>
            @enderror
            <br>
            {!! Form::submit('Asignar ROL', ['class'=>'btn btn-primary mt-2']) !!}

            {!! Form::close() !!}

        </div>
    </div>

@stop
