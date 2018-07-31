@extends('plantilla/layout')
@section('contenido')


<h1>AÑADIR USUARIO APLICACION PERFIL</h1>
<form action="{{ route('usuarioaplicacionperfil.store')}}" method="POST">
{{ csrf_field() }}
<div class="form-group">


    <label for="exampleInputEmail1">Codigo Usuario Aplicacion: </label>
    <select class="form-control" name="idUsuarioAplicacion" required>
        <option value="">Elige una opción</option>
        @forelse ($usuarioaplicacion as $usuarioaplicacion)
        <option value="{{ $usuarioaplicacion->idUsuarioAplicacion}}">Aplicacion: {{ $usuarioaplicacion->nombreAplicacion}}->Usuario: {{ $usuarioaplicacion->nombreUsuario}}</option>          
        @empty
        <option value="">No hay Usuarios Aplicacion creados</option>}
        @endforelse
    </select>

    <label for="exampleInputEmail1">Codigo Perfil: </label>
    <select class="form-control" name="idPerfil" required>
    <option value="">Elige una opción</option>
        @forelse ($perfil as $perfil)
        <option value="{{ $perfil->idPerfil}}">{{ $perfil->nombrePerfil}}</option>          
        @empty
        <option value="">No hay Perfiles creados</option>}
        @endforelse
    </select>
                
    
    <label for="exampleInputEmail1">Estado: </label>    
    <SELECT class="form-control" name="estado">
    	<OPTION value="0">ACTIVO</OPTION>
    	<OPTION value="1">INACTIVO</OPTION>
    </SELECT>
<br>
    <input class="btn btn-primary btn-block" type="submit" name="INGRESAR" value="AÑADIR">
    <br>
    <a href="{{route('usuarioaplicacionperfil.index')}} " class="btn btn-danger">CANCELAR</a>
    
</div>
</form>






@endsection