<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese nombre del rol']) !!}
    @error('name')
        <small class="text-danger" >{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <h3>Lista de Permisos</h3>
    @foreach ($permisos as $permiso)
        <div>
            <label>
                {!! Form::checkbox('permissions[]',$permiso->id,null, ['class'=>'mr-1']) !!}
                {{$permiso->description}}
            </label>
        </div>
    @endforeach
    @error('permissions')
        <small class="text-danger" >{{$message}}</small>
    @enderror
</div>
