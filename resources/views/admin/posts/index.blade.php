@extends('adminlte::page')

@section('title', 'Mi Blog')

@section('content_header')

    <a  class="btn btn-secondary btn-sm float-right" href="{{route('admin.posts.create')}}">Nuevo Post</a>

    <h1>Listado de Posts</h1>

@stop

@section('content')
    @livewire('admin.posts-index'){{-- componente livewire --}}

@stop
