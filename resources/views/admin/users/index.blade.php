@extends('adminlte::page')

@section('title', 'Mi Blog')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')


    @livewire('admin.users-index')

@stop
