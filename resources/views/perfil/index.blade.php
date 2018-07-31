@extends('plantilla.layout')
@section('contenido')

<div class="card mb-3">
        <div class="card-header">
        <a href="{{route('perfil.create')}}"><button class="btn btn-info">Nuevo</button></a>
          <i class="fa fa-table"></i> Lista de Perfiles</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Aplicacion</th>
                  <th>Nombre Perfil</th>
                  <th>Descripcion</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Aplicacion</th>
                  <th>Nombre Perfil</th>
                  <th>Descripcion</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                  <th></th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
              {{ csrf_field() }}
                @forelse ($perfil as $perfil)
                <tr>
                
                  <td>{{ $perfil->nombreAplicacion}}</td>               
                  <td>{{ $perfil->nombrePerfil}}</td>
                  <td>{{ $perfil->descripcion}}</td>
      					@if	($perfil->estado == 1)
      						<td>ACTIVO</td>
      					@else
      						<td>INACTIVO</td>
      					@endif

                  <td>
                    <a href="{{url('PerfilRol', [$perfil -> idPerfil])}}"><button class="btn btn-info">Roles</button></a>
                     </td>
                  <td>
                  	<a href="{{action('PerfilController@edit', $perfil -> idPerfil)}}"><button class="btn btn-info">Editar</button></a>
                     </td>

                     <td>
                  <form action="{{action('PerfilController@destroy', $perfil->idPerfil)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">

                    <button class="btn btn-danger" type="submit">X</button>
                    </form>
                    </td>
                </tr>
                @empty
                            <tr>
                                <td colspan="9"><h3>No hay Perfiles creados</h3></td>
                            </tr>
                @endforelse
                
              </tbody>
            </table>


     




          </div>
        </div>
        </div>
        <br>
@endsection