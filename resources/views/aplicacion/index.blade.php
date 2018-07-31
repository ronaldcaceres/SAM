@extends('plantilla.layout')
@section('contenido')

<div class="card mb-3">
        <div class="card-header">
        <a href="{{route('aplicacion.create')}}"><button class="btn btn-info">Nuevo</button></a>
          <i class="fa fa-table"></i> Lista de Aplicaciones</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Codigo Aplicacion</th>
                  <th>Nombre Aplicacion</th>
                  <th>Descripcion</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Codigo Aplicacion</th>
                  <th>Nombre Aplicacion</th>
                  <th>Descripcion</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
              {{ csrf_field() }}
                @forelse ($aplicacion as $aplicacion)
                <tr>
                  <td>{{ $aplicacion->codAplicacion}}</td>
                  <td>{{ $aplicacion->nombreAplicacion}}</td>
                  <td>{{ $aplicacion->descripcion}}</td>
      					@if	($aplicacion->estado == 1)
      						<td>ACTIVO</td>
      					@else
      						<td>INACTIVO</td>
      					@endif

                  
                  <td>
                  	<a href="{{action('AplicacionController@edit', $aplicacion -> idAplicacion)}}"><button class="btn btn-info">Editar</button></a>                 	 
                  </td>
                  <td>
                  <form action="{{action('AplicacionController@destroy', $aplicacion->idAplicacion)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">

                    <button class="btn btn-danger" type="submit">X</button>
                    </form>
                    </td>
                </tr>
                @empty
                            <tr>
                                <td colspan="9"><h3>No hay Aplicaciones creadas</h3></td>
                            </tr>
                @endforelse
                
              </tbody>
            </table>


     




          </div>
        </div>
        <br>
@endsection