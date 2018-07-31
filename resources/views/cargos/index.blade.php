@extends('plantilla.layout')
@section('contenido')

<div class="card mb-3">
        <div class="card-header">
        <a href="{{route('cargos.create')}}"><button class="btn btn-info">Nuevo</button></a>
          <i class="fa fa-table"></i> Lista de Cargos</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Area</th>
                  <th>Nombre Cargo</th>
                  <th>Descripcion</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Area</th>
                  <th>Nombre Cargo</th>
                  <th>Descripcion</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
              {{ csrf_field() }}
                @forelse ($cargos as $cargos)
                <tr>
                
                  <td>{{ $cargos->nombreArea}}</td>               
                  <td>{{ $cargos->nombreCargo}}</td>
                  <td>{{ $cargos->descripcion}}</td>
      					@if	($cargos->estado == 1)
      						<td>ACTIVO</td>
      					@else
      						<td>INACTIVO</td>
      					@endif
                    <td>
                  	<a href="{{action('CargosController@edit', $cargos -> idCargo)}}"><button class="btn btn-info">Editar</button></a>
                     </td>

                     <td>
                  <form action="{{action('CargosController@destroy', $cargos->idCargo)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">

                    <button class="btn btn-danger" type="submit">X</button>
                    </form>
                    </td>
                </tr>
                @empty
                            <tr>
                                <td colspan="9"><h3>No hay Cargos creados</h3></td>
                            </tr>
                @endforelse
                
              </tbody>
            </table>


     




          </div>
        </div>
        <br>
@endsection