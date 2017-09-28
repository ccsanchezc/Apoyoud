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
                    <div class="panel panel-default">
                    @if(Auth::User()->admin())
                    <table width="100%" class="table table-striped table-bordered table-responsive table-hover" id="dataTables-servi">
                                <thead>
                                    <tr>
                                        <th>   <div class="btn-toolbar pull-right" role="toolbar">
                                        <div class="btn-group">
                                <a href="{!!URL::to('/admin/crear_reporte_usuario/1')!!}" target="_blank" target="_blank" >
                                 <button type="button" class="btn btn-primary btn-sm">
                                  <span class="glyphicon glyphicon-eye-open"></span> Ver
                                </button></a>
                                
                                <a href="{!!URL::to('/admin/crear_reporte_usuario/2')!!}" target="_blank" >
                                <button type="button" class="btn btn-success btn-sm">
                                  <span class="glyphicon glyphicon-download-alt"></span> Descargar
                                </button></a>
                              </div>
                            </div></th>
                                    </tr>
                                </thead>
                    </table>
                    @endif
                        <div class="panel-heading">
                            Usuarios plataforma
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                           {!! Form::open (['route' => 'user.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right','role' => 'search'])!!}
                                <div class="form-group">
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre o código'])!!}
                                    
                                </div>
                             <button type="submit" class="btn btn-default">Buscar</button>
                            {!! Form::close()!!}
                            <table width="100%" class="table table-striped table-bordered table-responsive table-hover" id="tabla-User">
                                 {!!link_to_route('user.create', 'Crear nuevo usuario', null, ['class'=>'btn btn-success '])!!}
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Telefono</th>
                                        <th>Dirección</th>
                                        <th>Carrera</th>
                                        <th>Rol</th>
                                        <th>Tipo de Subsidio</th>
                                        <th>Servicio Social</th>
                                        <th>Operación</th>
                                    </tr>
                                </thead>
                               
                                @foreach($users as $user)
                                <tbody>
                                    <tr class="gradeX">
                                        <td>{{$user->codigo}}</td>
                                        <td>{{$user->nombre}}</td>
                                        <td>{{$user->apellido}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->telefono}}</td>
                                        <td>{{$user->direccion}}</td>
                                        @if(!empty($user->carrera))
                                        <td>{{$user->carrera}}</td>
                                        @else
                                        <td>NO APLICA</td>
                                        @endif
                                        <td>{{$user->type}}</td>
                                        @if(!empty($user->sub_usuario))
                                        <td>{{$user->sub_usuario->type}}</td>
                                        @else
                                        <td>NO APLICA</td>
                                        @endif
                                        @if(!empty($user->servi_usuario))
                                        <td>{{$user->servi_usuario->nombre.":  ".$user->servi_usuario->descripcion}}</td>
                                        @else
                                        <td>NO APLICA</td>
                                        @endif
                                        
                                        <td>{!!link_to_route('user.edit', 'Editar', $user->codigo,  ['class'=>'btn btn-primary'])!!}
                                      {!!link_to_route('user.destroy', 'Eliminar', $user->codigo,  ['onclick'=>"return confirm('¿Desea Eliminarlo?')" , 'class'=>'btn btn-danger'])!!}
                                      </td>
                                        
                                       
                                    </tr>
                                </tbody>
                                @endforeach
                               
                            </table>
                            <!-- /.table-responsive -->
                            {!! $users->render() !!}
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