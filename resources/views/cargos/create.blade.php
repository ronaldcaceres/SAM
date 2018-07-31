@extends('plantilla/layout')
@section('contenido')


<h1>AÑADIR APLICACION</h1>
<form action="{{ route('cargos.store')}}" method="POST">
{{ csrf_field() }}
<div class="form-group">

<div class="col-sm-12">
<div class="form-group form-float">

                                    <label for="exampleInputEmail1">Areas: </label>
                                        <select class="form-control" name="idArea" required>
                                        <option value="">Elige una opción</option>
                                            @forelse ($areas as $areas)
                                               @if ($areas->estado == 1)
                                                      <option value="{{ $areas->idArea}}">{{ $areas->nombreArea}}</option>           
                                               @endif        
                                            @empty
                                            <option value="">No hay Aplicaciones creadas</option>
                                            @endforelse
                                        </select>   
                                        <br><br>

                                        <br>

                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="nombreCargo" required>
                                            <label class="form-label">Nombre Cargo: </label>    
                                            
                                        </div>
                                        <br>
                                        <div class="form-line">
                                        <label for="exampleInputEmail1">Descripcion: </label>
                                        <textarea class="form-control" placeholder="Escribe aqui una descripcion" name="descripcion"></textarea>
                                            
                                              
                                            
                                        </div>
                                        <br>                          


                                    </div>
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
                            <a href="{{route('cargos.index')}} " class="btn btn-danger">CANCELAR</a>
                            
                        </div>
                        </form>






@endsection