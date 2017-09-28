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
                        <div class="panel-heading">
                            Servicio Social
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-responsive table-hover" id="dataTables-servi">
                                
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
                                        <td class="center">
                                        {!!link_to_route('serviusu.edit', 'Agregar', $servis->id,  ['class'=>'btn btn-danger'])!!}
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