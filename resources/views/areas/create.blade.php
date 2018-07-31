@extends('plantilla/layout')
@section('contenido')


<h1>AÑADIR AREAS</h1>
<form action="{{ route('areas.store')}}" method="POST">
{{ csrf_field() }}
<div class="form-group">

<div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="nombreArea" required>
                                            <label class="form-label">Nombre Area: </label>    
                                            
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
                            <a href="{{route('areas.index')}} " class="btn btn-danger">CANCELAR</a>
                            
                        </div>
                        </form>






@endsection