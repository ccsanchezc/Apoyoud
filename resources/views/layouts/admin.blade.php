<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
     


    <title>Inicio Apoyo </title>
   
    {!!Html::style('vendor/bootstrap/css/bootstrap.min.css')!!}
   {!!Html::style('vendor/metisMenu/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin.css')!!}
     {!!Html::style('vendor/font-awesome/css/font-awesome.min.css')!!}
     {!!Html::style('css/morris.css')!!}
     {!!Html::style('css/registeruseradmin.css')!!}
     {!!Html::style('vendor/datatables-plugins/dataTables.bootstrap.css')!!}
    {!!Html::style('vendor/datatablesresponsive/dataTables.responsive.css')!!}

    
    
  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css" />


     <link type='text/css” href=”css/smoothness/jquery-ui-1.7.1.custom.css' rel='stylesheet' />

  <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">  
    
    <!-- Bootstrap Core CSS -->
   

    <!-- MetisMenu CSS 
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

-->
    <!-- Custom CSS -->
   

    <!-- Morris Charts CSS 
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
-->
    <!-- Custom Fonts -->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
           
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                
          <li class="dropdown">    
                               
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->nombre. " ". Auth::user()->apellido }} <span class="caret"></span>
                                </a>
                                <input type="hidden" name="_codigo" value="{{Auth::user()->codigo}}" id="usercode">
    
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="{!!URL::to('/inicio')!!}"><i class="fa fa-fw fa-dashboard"></i> Inicio</a>
                    </li>
                    @if(Auth::User()->admin())
                    <li>
                        <a href="{!!URL::to('/admin/user')!!}"><i class="fa fa-fw fa-bar-chart-o"></i> Usuario</a>
                    </li>
                    <li>
                        <a href="{!!URL::to('/admin/serviA')!!}"><i class="fa fa-fw fa-table"></i> Servicio social</a>
                    </li>
                    <li>
                        <a href="{!!URL::to('/admin/sub')!!}"><i class="fa fa-fw fa-edit"></i>Subsidio</a>
                    </li>
                    <li>
                        <a href="{!!URL::to('/admin/menuA')!!}"><i class="fa fa-fw fa-desktop"></i>Menu del dia</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Reportes admin  <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="{!!URL::to('/admin/pdfuser')!!}">Reporte individual</a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    @if(Auth::User()->supervisor())
                    <li>
                        <a href="{!!URL::to('/super/menu')!!}"><i class="fa fa-fw fa-desktop"></i>Menu del dia</a>
                    </li>
                    <li>
                        <a href="{!!URL::to('/super/servi')!!}"><i class="fa fa-fw fa-table"></i> Servicio social</a>
                    </li>
                    <li>
                        <a href="{!!URL::to('/super/entrega')!!}"><i class="fa fa-fw fa-wrench"></i> Entrega de Almuerzo</a>
                    </li>
                    @endif

                    @if(Auth::User()->estudiante())
                    <li>
                        <a href="{!!URL::to('/estudi/serviusu')!!}"><i class="fa fa-fw fa-wrench"></i>Agregar Servicio Social</a>
                    </li>
                    
                    <li>
                        <a href="{!!URL::to('/estudi/historico')!!}"><i class="fa fa-fw fa-file"></i> Historico de Almuerzo</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Datos Personales  <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="{!!URL::to('/estudi/datos/'. Auth::user()->codigo.'/edit') !!}">Actualizar Datos</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    
                    
                     
                    <!--<li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    
  

    <script src="{{asset('/vendor/jquery/jquery.min.js')}}" charset="utf-8"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('/vendor/bootstrap/js/bootstrap.min.js')}}" charset="utf-8"></script>
 
    <!-- Metis Menu Plugin JavaScript -->
 
    <script src="{{asset('/vendor/metisMenu/metisMenu.min.js')}}" charset="utf-8"></script>
    <!-- Morris Charts JavaScript -->

    <script src="{{asset('/vendor/raphael/raphael.min.js')}}" charset="utf-8"></script>

    <script src="{{asset('/vendor/morrisjs/morris.min.js')}}" charset="utf-8"></script>

    <script src="{{asset('/data/morris-data.js')}}" charset="utf-8"></script>
    <!-- Custom Theme JavaScript -->

    <script src="{{asset('/js/sb-admin-2.js')}}" charset="utf-8"></script><!-- Este script despliega menu-->
    
    <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}" charset="utf-8"></script>
    
     <script src="{{asset('vendor/datatables-plugins/dataTables.bootstrap.min.js')}}" charset="utf-8"></script>


     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="js/moment.min.js"></script>
   <script src="js/bootstrap-datetimepicker.min.js"></script>
   <script src="js/bootstrap-datetimepicker.es.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
      <script src="{{asset('/tablas/scriptsearch.js')}}" charset="utf-8"></script>

       <script src="{{asset('/tablas/sciptsearch2.js')}}" charset="utf-8"></script>
<!--CALENDARIO-->
 
</head>
  

   <script>
        $( document ).ready(function() {
          
             $( "#fecha" ).datepicker( { dateFormat: 'yyyyy-mm-dd', format:'yyyy-mm-dd', minDate: 0 } );
             //$( "#fecha" ).datepicker({ minDate: -2, maxDate: "+1M +10D" });
             language: 'es'
             $("#datepicker").datepicker({
                minDate: "22/07/2017",
                maxDate: "28/07/2017"
                });
      
        });
    </script>
<!--<script >
      $( function() {
    $( "#fecha" ).datepicker();
    $( "#format" ).on( "change", function() {
      $( "#fecha" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
    });
  } );
  </script>-->


     
     
     
     <script>
    $(document).ready(function() {
        $('#dataTables-User').DataTable({
            responsive: true,
            paging: true,
            searching: true
        });
    });
    </script>
   <script>
    $(document).ready(function() {
        $('#dataTables-servi').DataTable({
            responsive: true,
            paging: true,
            searching: true
        });
    });
    </script>
    <script>
    $('#type').change(function() {
    
  
        if ($(this).val() == 'estudiante') {
             $('#x1').attr("value","estudi");
        $('#carrera').show();
             $('#subservi').show();
            $('#sub_id').show();
             $('#Servi_id').show();
            $("#carrera").attr("disabled",false);
              $("#sub_id").attr("disabled",false);
              $("#Servi_id").attr("disabled",false);
          }if ($(this).val() == 'supervisor'){
              //$('#carrera').hide();
              
              
              $('#x1').attr("value","supervisor");
              
            $("#carrera").attr("disabled",true);
              $("#sub_id").attr("disabled",true);
              $("#Servi_id").attr("disabled",true);
               $('#carrera').hide();
              $('#subservi').hide();
              $('#Servi_id').hide();
              // $("#carrera").attr("value","NO APLICA");
          
           
          }if ($(this).val() == 'admin'){
               
              
            $("#carrera").attr("disabled",true);
              $("#sub_id").attr("disabled",true);
              $("#Servi_id").attr("disabled",true);
             $('#carrera').hide();
              $('#subservi').hide();
               $('#Servi_id').hide();
               $('#x1').attr("value","admin");
          }
        });


    </script>
   

</body>

</html>
