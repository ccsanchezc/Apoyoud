@extends('layouts.admin')




@section('content')



<div id = "todo" class="row">
                <div class="col-lg-12">
                   <div class="col-lg-4">
                         <div class="panel panel-default">
                        <div class="panel-heading">
                            Usuario de la paltaforma
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           {!!Form::open()!!}
                          <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token1">
                            {!!Form::text('codigo',null,['id'=>'codigo1', 'class'=>'form-control','placeholder'=>'Código de Estudiante'])!!}
                            		
			    			{!!link_to('#', 'Buscar', ['id'=>'buscarpdf','class'=>'btn btn-primary',null])!!}
                        </div>
                        <!-- /.panel-body -->
                        
                    </div>
                       
                       
                   </div>
                  <div class="col-lg-8">
                      
                      <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-responsive table-hover" id="tabla-entrega">
                                
                                <thead>
                                   
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Almuerzos</th>
                                        <th>Operación</th>
                                       </tr>
                                </thead>
                               
                               
                                <tbody id="tabaladedatos">
                                    
                                </tbody>
                                
                               
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                    <!-- /.panel -->
                    <!-- /.panel -->
                      
                  </div>
                    
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          
        </div>
        <!-- /#page-wrapper -->

    </div>


@stop