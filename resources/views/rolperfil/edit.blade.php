@extends('plantilla/layout')
@section('contenido')


<h1>MODIFICAR ROL</h1>
<form action="{{route('rolperfil.update', $rolperfil -> idRolPerfil)}}" method="POST">

{{ csrf_field() }}
<div class="form-group">

<input name="_method" type="hidden" value="PATCH">
<label for="exampleInputEmail1">Codigo Rol: </label>    


    <select class="form-control" name="idRol">
        @forelse ($rol as $rol)
        

            @if(($rol->idRol) == ($rolperfil->idRol))

            <option value="{{ $rol->idRol}}" selected>{{ $rol->nombreRol}}</option>  
            @endif  
            <option value="{{ $rol->idRol}}">{{ $rol->nombreRol}}</option>        
        @empty
        <option value="">No hay Roles creados</option>}
        @endforelse
    </select>
 




<label for="exampleInputEmail1">Codigo Perfil: </label>   
    <select class="form-control" name="idPerfil">
        @forelse ($perfil as $perfil)
        

            @if(($perfil->idPerfil) == ($rolperfil->idPerfil))

            <option value="{{ $perfil->idPerfil}}" selected>{{ $perfil->nombrePerfil}}</option>  
            @endif  
            <option value="{{ $perfil->idPerfil}}">{{ $perfil->nombrePerfil}}</option>        
        @empty
        <option value="">No hay Perfiles creados</option>}
        @endforelse
    </select>


                

    
    
    <label for="exampleInputEmail1">Estado: </label>    
    <SELECT class="form-control" name="estado">
    @if($rolperfil -> estado == 0)
        <OPTION value="0">ACTIVO</OPTION>
        <OPTION value="1">INACTIVO</OPTION>
    @else
        <OPTION value="1">INACTIVO</OPTION>
        <OPTION value="0">ACTIVO</OPTION>
    @endif
    </SELECT>
    <br>

    <button class="btn btn-primary btn-block" type="submit">MODIFICAR</button>
    <a href="{{route('rolperfil.index')}} " class="btn btn-default waves-effect">CANCELAR</a>
    
</div>
</form>






@endsection