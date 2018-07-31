@extends('plantilla/layout')
@section('contenido')


<h1>AÑADIR USUARIO APLICACION</h1>
<form action="{{ route('usuarioaplicacion.store')}}" method="POST">
{{ csrf_field() }}
<div class="form-group">


    <label for="exampleInputEmail1">Aplicacion: </label>
    <select class="form-control" name="idAplicacion" required>
    <option value="">Elige una opción</option>
        @forelse ($aplicacion as $aplicacion)
        <option value="{{ $aplicacion->idAplicacion}}">{{ $aplicacion->nombreAplicacion}}</option>          
        @empty
        <option value="">No hay Aplicaciones creados</option>}
        @endforelse
    </select>

    <label for="exampleInputEmail1">Usuario: </label>
    <select class="form-control" name="idUsuario" required>
    <option value="">Elige una opción</option>
        @forelse ($usuarios as $usuarios)
        <option value="{{ $usuarios->idUsuario}}">{{ $usuarios->nombreUsuario}}</option>          
        @empty
        <option value="">No hay Usuario creados</option>}
        @endforelse
    </select>
                
 <br>
                                <label for="exampleInputEmail1">Estado: </label>   
                                <div class="demo-switch">
                                    <div class="switch">
                                        <label>INACTIVO<input type="checkbox" name="estado" checked><span class="lever"></span>ACTIVO</label>
                                    </div>
                                
                                </div>   
    
<br>
    <input class="btn btn-primary btn-block" type="submit" name="INGRESAR" value="AÑADIR">
    <br>
    <a href="{{route('usuarioaplicacion.index')}} " class="btn btn-danger">CANCELAR</a>
    
</div>
</form>






@endsection