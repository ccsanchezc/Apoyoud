@extends('layouts.admin')

@if (Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
 {{Session::get('message')}}

</div>
@endif

@section('content')

<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-striped table-bordered table-responsive table-hover" id="dataTables-servi">
                                <thead>
                                    <tr>
                                        <th>   <div class="btn-toolbar pull-right" role="toolbar">
                                        <div class="btn-group">
                                <a href="{!!URL::to('/admin/crear_reporte_porsubsidio/1')!!}" target="_blank" target="_blank" >
                                 <button type="button" class="btn btn-primary btn-sm">
                                  <span class="glyphicon glyphicon-eye-open"></span> Ver
                                </button></a>
                                
                                <a href="{!!URL::to('/admin/crear_reporte_porsubsidio/2')!!}" target="_blank" >
                                <button type="button" class="btn btn-success btn-sm">
                                  <span class="glyphicon glyphicon-download-alt"></span> Descargar
                                </button></a>
                              </div>
                            </div></th>
                                    </tr>
                                </thead>
                    </table>
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <thead>
                                    <tr>
                                        <th> SUBSIDIOS PLATAFORMA</th>
                                        
                                    </tr>
                            </thead>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        {!! Form::open (['route' => 'sub.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right','role' => 'search'])!!}
                                <div class="form-group">
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Descripcion o Id'])!!}
                                    
                                </div>
                             <button type="submit" class="btn btn-default">Buscar</button>
                         {!! Form::close()!!}

                            <table width="100%" class="table table-striped table-bordered table-responsive table-hover" id="dataTables-servi">
                                 {!!link_to_route('sub.create', 'Crear nuevo subsidio', null, ['class'=>'btn btn-success '])!!}
                                <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Descripción</th>
                                        <th>Operación</th>
                                    </tr>
                                </thead>
                                @foreach($subsidio as $subsi)
                                <tbody>
                                    <tr class="gradeX">
                                        <td>{{$subsi->type}}</td>
                                        <td>{{$subsi->descripcion}}</td>
                                        <td class="center">{!!link_to_route('sub.edit', 'Editar', $subsi->id,  ['class'=>'btn btn-primary'])!!}
                                        {!!link_to_route('sub.destroy', 'Eliminar', $subsi->id,  ['onclick'=>"return confirm('¿Desea Eliminarlo?')" , 'class'=>'btn btn-danger'])!!}
                                      </td></td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <!-- /.table-responsive -->
                            {!! $subsidio->render() !!}
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          
        </div>
        <!-- /#page-wrapper -->

    </div>

    
    
    <!-- /#wrapper -->
    <!--<script src="{{asset('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}" charset="utf-8"></script>
    
     <script src="{{asset('vendor/datatables-plugins/dataTables.bootstrap.min.js')}}" charset="utf-8"></script>-->
     
     <!-- REPORTE -->
@stop