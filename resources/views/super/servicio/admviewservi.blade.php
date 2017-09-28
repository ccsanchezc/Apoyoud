@extends('layouts.admin')



@section('content')
<!-- /.row -->
           
@if (Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
 {{Session::get('message')}}

</div>
@endif      
           
            <div class="row">
                <div class="col-lg-12">
                @if(Auth::User()->admin())
                <table width="100%" class="table table-striped table-bordered table-responsive table-hover" id="dataTables-servi">
                                <thead>
                                    <tr>
                                        <th>   <div class="btn-toolbar pull-right" role="toolbar">
                                        <div class="btn-group">
                                <a href="{!!URL::to('/admin/crear_reporte_porservicio/1')!!}" target="_blank" target="_blank" >
                                 <button type="button" class="btn btn-primary btn-sm">
                                  <span class="glyphicon glyphicon-eye-open"></span> Ver
                                </button></a>
                                
                                <a href="{!!URL::to('/admin/crear_reporte_porservicio/2')!!}" target="_blank" >
                                <button type="button" class="btn btn-success btn-sm">
                                  <span class="glyphicon glyphicon-download-alt"></span> Descargar
                                </button></a>
                              </div>
                            </div></th>
                                    </tr>
                                </thead>
                    </table>
                @endif
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Servicios plataforma
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        {!! Form::open (['route' => 'servi.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right','role' => 'search'])!!}
                                <div class="form-group">
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Descripcion o Id'])!!}
                                    
                                </div>
                             <button type="submit" class="btn btn-default">Buscar</button>
                            {!! Form::close()!!}

                            <table width="100%" class="table table-striped table-bordered table-responsive table-hover" id="dataTables-servi">
                                 {!!link_to_route('servi.create', 'Crear nuevo servicio', null, ['class'=>'btn btn-success '])!!}
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Operación</th>
                                    </tr>
                                </thead>
                                @foreach($serviciosocial as $servis)
                                <tbody>
                                    <tr class="gradeX">
                                        <td>{{$servis->nombre}}</td>
                                        <td>{{$servis->descripcion}}</td>
                                        <td class="center">{!!link_to_route('servi.edit', 'Editar', $servis->id,  ['class'=>'btn btn-primary'])!!}
                                        {!!link_to_route('servi.destroy', 'Eliminar', $servis->id,  ['onclick'=>"return confirm('¿Desea Eliminarlo?')" , 'class'=>'btn btn-danger'])!!}
                                      </td></td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <!-- /.table-responsive -->
                            {!! $serviciosocial->render() !!}
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
     
     
@stop