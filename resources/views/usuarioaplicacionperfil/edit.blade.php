@extends('plantilla/layout')
@section('contenido')


<h1>MODIFICAR USUARIO APLICACION PERFIL</h1>
<form action="{{route('usuarioaplicacionperfil.update', $usuarioaplicacionperfil -> idUsuarioAplicacionPerfil)}}" method="POST">

{{ csrf_field() }}
<div class="form-group">

<input name="_method" type="hidden" value="PATCH">
<label for="exampleInputEmail1">Codigo Usuario Aplicacion: </label>    


    <select class="form-control" name="idUsuarioAplicacion">
        @forelse ($usuarioaplicacion as $usuarioaplicacion)
        

            @if(($usuarioaplicacion->idUsuarioAplicacion) == ($usuarioaplicacionperfil->idUsuarioAplicacion))
            
            <option value="{{ $usuarioaplicacion->idUsuarioAplicacion}}" selected>Aplicacion: {{ $usuarioaplicacion->idAplicacion}} Usuario: {{ $usuarioaplicacion->idUsuario}}</option>  
            
            @endif  
            <option value="{{ $usuarioaplicacion->idUsuarioAplicacion}}">Aplicacion: {{ $usuarioaplicacion->idAplicacion}} Usuario: {{ $usuarioaplicacion->idUsuario}}</option>        
        @empty
        <option value="">No hay Usuarios Aplicacion creados</option>}
        @endforelse
    </select>





<label for="exampleInputEmail1">Codigo Perfil: </label>   
    <select class="form-control" name="idPerfil">
        @forelse ($perfil as $perfil)
        

            @if(($perfil->idPerfil) == ($usuarioaplicacionperfil->idPerfil))

            <option value="{{ $perfil->idPerfil}}" selected>{{ $perfil->nombrePerfil}}</option>  
            @endif  
            <option value="{{ $perfil->idPerfil}}">{{ $perfil->nombrePerfil}}</option>        
        @empty
        <option value="">No hay Perfiles creados</option>}
        @endforelse
    </select>


                

    
    
    <label for="exampleInputEmail1">Estado: </label>    
    <SELECT class="form-control" name="estado">
    @if($usuarioaplicacionperfil -> estado == 0)
        <OPTION value="0">ACTIVO</OPTION>
        <OPTION value="1">INACTIVO</OPTION>
    @else
        <OPTION value="1">INACTIVO</OPTION>
        <OPTION value="0">ACTIVO</OPTION>
    @endif
    </SELECT>
    <br>

    <button class="btn btn-primary btn-block" type="submit">MODIFICAR</button>
    <a href="{{route('usuarioaplicacionperfil.index')}} " class="btn btn-default waves-effect">CANCELAR</a>
    
</div>
</form>






@endsection