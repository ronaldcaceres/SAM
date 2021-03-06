@extends('plantilla/layout')


@section('contenido')
<h1>AÑADIR ROLes</h1>
<form action="{{ route('rol.store')}}" method="POST">
{{ csrf_field() }}
<div class="form-group">


    <label for="exampleInputEmail1">Codigo Aplicacion: </label>
    <select class="form-control" name="idAplicacion" required>
    <option value="">Elige una opción</option>
        @forelse ($aplicacion as $aplicacion)
        <option value="{{ $aplicacion->idAplicacion}}">{{ $aplicacion->nombreAplicacion}}</option>          
        @empty
        <option value="">No hay Aplicaciones creados</option>}
        @endforelse
    </select>
                

    <label for="exampleInputEmail1">Nombre Rol: </label>
    <input class="form-control" type="text" placeholder="Nombre de Rol..." name="nombreRol" required>
    <label for="exampleInputEmail1">Descripcion: </label>
    <textarea class="form-control" placeholder="Escribe aqui una descripcion" name="descripcion"></textarea>
    <label for="exampleInputEmail1">Nombre Formulario: </label>
    <input class="form-control" type="text" placeholder="Nombre de Formulario..." name="nombreFormulario" required>
    
    <label for="exampleInputEmail1">Estado: </label>    
    <SELECT class="form-control" name="estado">
    	<OPTION value="0">ACTIVO</OPTION>
    	<OPTION value="1">INACTIVO</OPTION>
    </SELECT>
<br>
    <input class="btn btn-primary btn-block" type="submit" name="INGRESAR" value="AÑADIR">
    <br>
    <a href="{{route('rol.index')}} " class="btn btn-danger">CANCELAR</a>
    
</div>
</form>

@endsection





