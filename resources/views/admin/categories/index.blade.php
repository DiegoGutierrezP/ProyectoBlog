@extends('adminlte::page')

@section('title', 'Mi Blog')

@section('content_header')
    <h1>Lista de Categorias</h1>
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
        @can('admin.categories.create'){{-- directiva encargado de verficar si tenemos permiso  , definido en RoleSeeder--}}
            <div class="card-header">
                <a class="btn btn-secondary " href="{{route('admin.categories.create')}}">Agregar Categoria</a>
            </div>
        @endcan
        <div class="card-body">
           <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->name}}</td>


                                <td width="10px">
                                    @can('admin.categories.edit'){{-- directiva encargado de verficar si tenemos permiso --}}
                                        <a href="{{route('admin.categories.edit',$c)}}" class="btn btn-primary btn-sm">Editar</a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.categories.destroy'){{-- directiva encargado de verficar si tenemos permiso --}}
                                        <form action="{{route('admin.categories.destroy',$c)}}" method="POST">
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


