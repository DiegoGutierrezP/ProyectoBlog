@extends('adminlte::page')

@section('title', 'Mi Blog')

@section('content_header')
    <h1>Editar Post</h1>
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
        {!! Form::model($post, ['route' => ['admin.posts.update',$post], 'method'=>'put' ,'files'=>true]) !!}

            @include('admin.posts.partials.form')

            {!! Form::submit('Editar Post', ['class'=> 'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>
</div>

@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@endsection

@section('js')
    {{-- indicar direccion desde la carpeta public --}}
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>

    <script>
        $(document).ready(function(){
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        })
        //plugin ckeditor5
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error=>{
                 console.error(error);
            })

        ClassicEditor
            .create(document.querySelector('#extract'))
            .catch(error=>{
                console.error(error);
            })

        //

        //codigo para cargar previsulizar la imagen a subir
        document.getElementById('file').addEventListener('change',cambiarImagen);
        function cambiarImagen(event){

            var file = event.target.files[0];
             var reader = new FileReader();

             reader.onload = (event) => {
                document.getElementById('picture').setAttribute('src',event.target.result);
             };

             reader.readAsDataURL(file);

        }


    </script>
@stop
