@extends('adminlte::page')

@section('title', 'Mi Blog')

@section('content_header')
    <h1>Lista de Etiquetas</h1>
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
        @can('admin.tags.create')
            <div class="card-header">
                <a class="btn btn-secondary float-right " href="{{route('admin.tags.create')}}">Agregar Etiqueta</a>
            </div>
        @endcan
        <div class="card-body">
           <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Color</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->color}}</td>
                            <td width="10px">
                                @can('admin.tags.edit')
                                    <a href="{{route('admin.tags.edit',$tag)}}" class="btn btn-primary btn-sm">Editar</a>
                                @endcan

                            </td>
                            <td width="10px">
                                @can('admin.tags.destroy')
                                    <form action="{{route('admin.tags.destroy',$tag)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
           </table>
        </div>
    </div>
@stop
