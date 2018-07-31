@extends('plantilla/layout')
@section('contenido')


<h1>MODIFICAR REGIONALES</h1>
<form action="{{route('regionales.update', $regionales -> idRegional)}}" method="POST">

{{ csrf_field() }}
<div class="form-group">

<input name="_method" type="hidden" value="PATCH">


    <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="nombreRegional" value="{{$regionales -> nombreRegional}}" required>
                                            <label class="form-label">Nombre Regional </label>    
                                            
                                        </div>
                                        <br>
                                        <div class="form-line">
                                        <label for="exampleInputEmail1">Descripcion: </label>
                                        <textarea class="form-control" placeholder="Escribe aqui una descripcion" name="descripcion">{{$regionales -> descripcion}}</textarea>
                                            
                                              
                                            
                                        </div>
                                        <br>
                                        
                                        <br>                          


                                    </div>
                                </div>
                

    
                                @if($regionales -> estado == 1)
                                        <div class="demo-switch">
                                            <div class="switch">
                                            
                                                <label>INACTIVO<input type="checkbox" name="estado" checked><span class="lever"></span>ACTIVO</label>
                                            </div>
                                        
                                        </div>
                                        @else
                                        <div class="demo-switch">
                                            <div class="switch">
                                                <label>INACTIVO<input type="checkbox" name="estado"><span class="lever"></span>ACTIVO</label>
                                                
                                            
                                            </div>
                                        
                                        </div>
                                        @endif

                    <button class="btn btn-primary btn-block" type="submit">MODIFICAR</button>
                    <a href="{{route('regionales.index')}} " class="btn btn-default waves-effect">CANCELAR</a>
    
</div>
</form>






@endsection