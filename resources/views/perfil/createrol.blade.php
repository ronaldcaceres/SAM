@extends('plantilla/layout')


@section('contenido')

<div class="card mb-3">
        <div class="card-header">
        <a href="{{route('rol.create')}}"><button class="btn btn-info">Nuevo</button></a>
          <i class="fa fa-table"></i> Lista de Roles - Perfil: {{ $perfil->nombrePerfil}} - Aplicacion: @foreach($aplicacion as $aplicacion){{ $aplicacion->nombreAplicacion}}@endforeach</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Aplicacion</th>
                  <th>Nombre Rol</th>
                  <th>Descripcion</th>
                  <th>Nombre Formulario</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Aplicacion</th>
                  <th>Nombre Rol</th>
                  <th>Descripcion</th>
                  <th>Nombre Formulario</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                  <th></th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
              {{ csrf_field() }}
                @forelse ($rolperfil as $rolperfil)
                <tr>
                  <td>{{ $rolperfil->nombreAplicacion}}</td>
                  <td>{{ $rolperfil->nombreRol}}</td>
                  <td>{{ $rolperfil->descripcion}}</td>
                  <td>{{ $rolperfil->nombreFormulario}}</td>
                @if ($rolperfil->estado == 1)
                  <td>ACTIVO</td>
                @else
                  <td>INACTIVO</td>
                @endif

                  
                  <td>
                    <a href="{{action('RolController@edit', $rolperfil -> idRol)}}"><button class="btn btn-info">Editar</button></a>
                    </td>
                     <td>
                    <a href="{{url('RolPerfilEliminar', $rolperfil -> idRol)}}"><button class="btn btn-danger">X</button></a>
                     </td>
                </tr>
                @empty
                            <tr>
                                <td colspan="9"><h3>No hay Rol creados</h3></td>
                            </tr>
                @endforelse                
              </tbody>
            </table>




          </div>
        </div>
    </div>
        <br>




















<h1>AÑADIR ROLES</h1>
<form action="{{ url('storeroles')}}" method="POST">
{{ csrf_field() }}
<div class="form-group">

<input type="hidden" value="{{ $perfil->idPerfil}}" name="idPerfil">
    <label for="exampleInputEmail1">Codigo Aplicacion: </label>
    <select class="form-control" name="idAplicacion" readonly="readonly">       
        <option value="{{ $perfil->idAplicacion}}">{{ $perfil->idAplicacion}}</option>         
    </select>
    <br>
  
                                       
<div class="form-line">
                                            
    <input class="form-control" type="text" name="nombreRol" required>
     <label class="form-label">Nombre Rol: </label>                                           
                                            
    </div>                                        
<br>
    <div class="form-line">
    <label for="exampleInputEmail1">Descripcion: </label>
    <textarea class="form-control" placeholder="Escribe aqui una descripcion" name="descripcion"></textarea>                                    
    </div>                                    
                                        
<br>
                                       
<div class="form-line">
                                            
    <input class="form-control" type="text" name="nombreFormulario" required>
     <label class="form-label">Nombre Formulario: </label>                                           
                                            
    </div> 

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
    <a href="{{route('perfil.index')}} " class="btn btn-danger">CANCELAR</a>
    
</div>
</form>

@endsection
