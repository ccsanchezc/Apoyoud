@extends('layouts.admin')


@section('content')
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Inicio 
                        </h1>
                    </div>
                </div>
                <!-- /.row -->


                <!-- /.row -->

                <div class="row">
                    @if(Auth::User()->admin() or Auth::User()->supervisor())
                    <div class="col-lg-3 col-md-6 col-md-offset-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-calendar fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$menufecha}}</div>
                                        <div>Almuerzos restantes!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif

                    @if(Auth::User()->estudiante())
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-calendar fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$menufecha}}</div>
                                        <div>Almuerzos restantes!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-stats fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$subsidio}}</div>
                                        <div>Tipo de Subsidio!</div>
                                    </div>
                                </div>
                            </div>
                            
                                <div class="panel-footer">
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-money fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{"$" . $precio}}</div>
                                        <div>Saldo!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{!!URL::to('/estudi/recibo')!!}">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-cutlery fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$cantidad}}</div>
                                        <div>Almuerzos pedidos!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{!!URL::to('/estudi/historico')!!}">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                @endif
                <!-- /.row -->
                <div class="row">

                <!-- Section Header -->
                
                <!-- Section Header End -->
 
                <div class="our-services">
             <div class="col-md-12 col-sm-12 col-xs-12 section-header1">
                    <h2><span class="page-header">Almuerzo del dia</span></h2>
                   
                    
                </div>
        
         <div class="row centered-form"> 
         <div class="col-md-5 col-sm-5 col-xs-5 text-xs-center col-center col-md-offset-1" >
                        <div class="panel">
                        <div class="col-md-10 col-sm-10 col-xs-10 text-xs-center col-center col-md-offset-1">
                            <div class="icon"> <h2>Sopa</h2>
                            </div> 
                            <p>{{$sopa}}</p>
                            <img src="home/images/sopa.jpg" alt="Custom Image">
                            </div> 
                        </div>

                            
</div>
                        <div class="col-md-5 col-sm-5 col-xs-5 text-xs-center col-center" >
                        <div class="panel">
                        <div class="col-md-10 col-sm-10 col-xs-10 text-xs-center col-center col-md-offset-1">
                            <div class="icon"> <h2>Plato fuerte</h2>
                            </div> 
                            <p>{{$fuerte}}</p>
                            <img src="home/images/fuerte.jpg" alt="Custom Image">
                            </div> 
                            </div> 
</div> 
</div>
</div>
 <div class="row centered-form">
                        <div class="col-md-5 col-sm-5 col-xs-5 text-xs-center col-center    col-md-offset-1" >
                        <div class="panel">
                        <div class="col-md-10 col-sm-10 col-xs-10 text-xs-center col-center col-md-offset-1">
                            <div class="icon"> <h2>Bebida</h2>
                            </div>
                            
                            <p>{{$jugo}} </p>
                            <img src="home/images/bebida.jpg" alt="Custom Image">
                        </div>
                        </div>
</div>
                        <div class="col-md-5 col-sm-5 col-xs-5 text-xs-center col-center" >
                        <div class="panel">
                        <div class="col-md-10 col-sm-10 col-xs-10 text-xs-center col-center col-md-offset-1">
                            <div class="icon"> <h2>Postre</h2>
                            </div>
                            
                            <p>{{$postre}} </p>
                            <img src="home/images/postre.jpg" alt="Custom Image">
                        </div>
                        </div>
</div>
                     
                    </div> 
                    </div>
                
            </div>
            </div>

            <!-- /.container-fluid -->

@stop