@extends('layouts.admin')
@section('content')
<div class="container">
      
        <div class="row centered-form">
        <div class="center">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Actualizar Datos: {{ $user->nombre." ". $user->apellido }}<small> Apoyo alimentario</small></h3>
			 			</div>
			 			<div class="panel-body">
			    		{!!Form::model($user,['route'=>['datos.update',$user->codigo],'method'=>'PUT'])!!}
			    		   
			    		<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                             {!!Form::text('nombre',null,['id'=>'nombre', 'class'=>'form-control ', 'disabled','placeholder'=>'Nombres'])!!}
			               
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						{!!Form::text('apellido',null,['id'=>'apellido', 'class'=>'form-control','disabled','placeholder'=>'Apellidos'])!!}
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    {!!Form::text('codigo',null,['id'=>'codigo', 'class'=>'form-control','disabled','placeholder'=>'Código de Estudiante'])!!}
                                </div>
                                </div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    				<div class="form-group">
			    	            {!!Form::text('telefono',null,['id'=>'telefono', 'class'=>'form-control','placeholder'=>'Numero de Telefono'])!!}
			    	        </div>
			    				</div>
                                   
			    			</div>
                            
			    			
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						{!!Form::text('direccion',null,['id'=>'direccion', 'class'=>'form-control','placeholder'=>'Dirección'])!!}
			    	   				 </div>
			    	   			</div>
			    	   			<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						{!!Form::email('email',null,['id'=>'email', 'class'=>'form-control','placeholder'=>'Correo Electronico'])!!}
			    			    	</div>
			    	   			</div>
			    	        </div>
                         <div class="form-group">
			    			 {!!Form::text('carrera',null,['id'=>'carrera', 'class'=>'form-control','disabled','placeholder'=>'Dirección'])!!}
			    			</div>
			    			
			    			
			    			{!!Form::submit('Actualizar',['class'=>'btn btn-info btn-block'])!!}
			    		    
			    	    {!!Form::close()!!}
			    	  
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
@stop