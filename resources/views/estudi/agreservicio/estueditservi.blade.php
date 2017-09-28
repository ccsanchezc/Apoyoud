@extends('layouts.admin')
@section('content')
<div class="container">
      
        <div class="row centered-form">
        <div class="center">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Agregar Servicio Social: {{ $user->nombre." ". $user->apellido }}</h3>
			 			</div>
			 			<div class="panel-body">
			    		{!!Form::model($user,['route'=>['serviusu.update',$user->codigo],'method'=>'PUT'])!!}
			    		   
			    		<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                             {!!Form::text('nombre',null,['id'=>'nombre', 'class'=>'form-control ', 'disabled','placeholder'=>'Nombres'])!!}
			               
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						{!!Form::text('apellido',null,['id'=>'apellido', 'class'=>'form-control' , 'disabled','placeholder'=>'Apellidos'])!!}
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    {!!Form::text('codigo',null,['id'=>'codigo', 'class'=>'form-control', 'disabled','placeholder'=>'Código de Estudiante'])!!}
                                </div>
                                </div>
                                   
			    		</div>
			    		<div class="row">

                            
                            <div class="form-group">
                             {!!Form::hidden('Servi_id',$serviid,null,['id'=>'Servi_id', 'class'=>'form-control ', 'disabled','placeholder'=>'Id del servicio social'])!!}
			               
                                </div>
			               
			    				 <div class="form-group">
                                    {{Form::hidden('Servi_nombre',$serviciosocial,null, ['class'=>'form-control', 'disabled','placeholder'=>'Nombre del servicio social'])}}
                                            
                                 </div>      
			    		</div>
			    			{!!Form::submit('Agregar',['class'=>'btn btn-info btn-block'])!!}
			    		    
			    	    {!!Form::close()!!}
			    	  
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
@stop