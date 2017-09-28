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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Menú plataforma
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        {!! Form::open (['route' => 'menu.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right','role' => 'search'])!!}
                                <div class="form-group">
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Busque en el menu'])!!}
                                    
                                </div>
                             <button type="submit" class="btn btn-default">Buscar</button>
                            {!! Form::close()!!}
                            <table width="100%" class="table table-striped table-bordered table-responsive table-hover" id="dataTables-servi">
                                 {!!link_to_route('menu.create', 'Crear nuevo menú', null, ['class'=>'btn btn-success '])!!}
                                <thead>
                                    <tr>
                                        <th>Sopa</th>
                                        <th>Plato Fuerte</th>
                                        <th>Postre</th>
                                        <th>Jugo</th>
                                        <th>Cantidad total</th>
                                        <th>Fecha</th>
                                        <th>Operación</th>
                                    </tr>
                                </thead>
                                @foreach($menu as $men)
                                <tbody>
                                    <tr class="gradeX">
                                        <td>{{$men->sopa}}</td>
                                        <td>{{$men->plato_fuerte}}</td>
                                        <td>{{$men->jugo}}</td>
                                        <td>{{$men->postre}}</td>
                                        <td>{{$men->cantitotal}}</td>
                                        <td>{{$men->fecha}}</td>
                                        <td class="center">{!!link_to_route('menu.edit', 'Editar', $men->id,  ['class'=>'btn btn-primary'])!!}
                                        {!!link_to_route('menu.destroy', 'Eliminar', $men->id,  ['onclick'=>"return confirm('¿Desea Eliminarlo?')" , 'class'=>'btn btn-danger'])!!}
                                      </td></td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <!-- /.table-responsive -->
                            {{ $menu->render() }}
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