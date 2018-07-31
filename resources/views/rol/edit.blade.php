@extends('plantilla/layout')
@section('contenido')


<h1>MODIFICAR ROL</h1>
<form action="{{route('rol.update', $rol -> idRol)}}" method="POST">

{{ csrf_field() }}
<div class="form-group">

<input name="_method" type="hidden" value="PATCH">
<label for="exampleInputEmail1">Codigo Aplicacion: </label>    


    <select class="form-control" name="idAplicacion">
        @forelse ($aplicacion as $aplicacion)
        

            @if(($rol->idAplicacion) == ($aplicacion->idAplicacion))

            <option value="{{ $aplicacion->idAplicacion}}" selected>{{ $aplicacion->nombreAplicacion}}</option>  
            @endif  
            <option value="{{ $aplicacion->idAplicacion}}">{{ $aplicacion->nombreAplicacion}}</option>        
        @empty
        <option value="">No hay Aplicaciones creados</option>}
        @endforelse
    </select>
                

    <label for="exampleInputEmail1">Nombre Rol: </label>
    <input class="form-control" type="text" placeholder="Nombre de Rol..." name="nombreRol" value="{{$rol -> nombreRol}}">
    <label for="exampleInputEmail1">Descripcion: </label>
    <textarea class="form-control" placeholder="Escribe aqui una descripcion" name="descripcion">{{$rol -> descripcion}}</textarea>
    <label for="exampleInputEmail1">Nombre Formulario: </label>
    <input class="form-control" type="text" placeholder="Nombre de formulario..." name="nombreFormulario" value="{{$rol -> nombreFormulario}}">
    
    <label for="exampleInputEmail1">Estado: </label>    
    <SELECT class="form-control" name="estado">
    @if($rol -> estado == 0)
        <OPTION value="0">ACTIVO</OPTION>
        <OPTION value="1">INACTIVO</OPTION>
    @else
        <OPTION value="1">INACTIVO</OPTION>
        <OPTION value="0">ACTIVO</OPTION>
    @endif
    </SELECT>
    <br>

    <button class="btn btn-primary btn-block" type="submit">MODIFICAR</button>
    <a href="{{route('rol.index')}} " class="btn btn-default waves-effect">CANCELAR</a>
    
</div>
</form>






@endsection