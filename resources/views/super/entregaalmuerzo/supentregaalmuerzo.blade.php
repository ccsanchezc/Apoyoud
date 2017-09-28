@extends('layouts.admin')


@section('content')
 <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
  <strong>Registrado!</strong> Correctamente.
</div>

  <div id = "todo" class="row">
                <div class="col-lg-12">
                   <div class="col-lg-4">
                         <div class="panel panel-default">
                        <div class="panel-heading">
                            Usuarios plataforma
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           {!!Form::open()!!}
                          <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token">
                            {!!Form::text('codigo',null,['id'=>'codigoe', 'class'=>'form-control','placeholder'=>'Código de Estudiante'])!!}
                            		
			    			{!!link_to('#', 'Buscar', ['id'=>'registro','class'=>'btn btn-primary',null])!!}
			    		    {!!link_to('#', 'Registrar', ['id'=>'daralmuerzo','disabled'=>'disabled','class'=>'btn btn-success',null])!!}
			    	   
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
                                        <th>Carrera</th>
                                       </tr>
                                </thead>
                               
                               
                                <tbody id="datostablae">
                                    
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