@extends('layouts.admin')
@section('content')
<?php $x1 = ''; ?>
<div class="container">
      
        <div class="row centered-form">
        <div class="center">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Editar usuario: {{ $user->nombre." ". $user->apellido }}<small> Apoyo alimentario</small></h3>
			 			</div>
			 			<div class="panel-body">
			    		{!!Form::model($user,['route'=>['user.update',$user->codigo],'method'=>'PUT'])!!}
			    		   
			    		<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                             {!!Form::text('nombre',null,['id'=>'nombre', 'class'=>'form-control ','placeholder'=>'Nombres'])!!}
			               
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						{!!Form::text('apellido',null,['id'=>'apellido', 'class'=>'form-control','placeholder'=>'Apellidos'])!!}
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    {!!Form::text('codigo',null,['id'=>'codigo', 'class'=>'form-control','placeholder'=>'Código de Estudiante'])!!}
                                </div>
                                </div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    				<div class="form-group">
			    	            {!!Form::text('telefono',null,['id'=>'telefono', 'class'=>'form-control','placeholder'=>'Numero de Telefono'])!!}
			    	        </div>
			    				</div>
                                   
			    			</div>
                            
			    			<div class="form-group">
			    				{!!Form::email('email',null,['id'=>'email', 'class'=>'form-control','placeholder'=>'Correo Electronico'])!!}
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    					
			    						{!!Form::password('password',['id'=>'password', 'class'=>'form-control ','placeholder'=>'Contraseña'])!!}
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    					{!!Form::password('password_confirmation',['id'=>'password_confirmation', 'class'=>'form-control ','placeholder'=>'Confirmar Contraseña'])!!}
			    						
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
			    			
                            
			    			    <select class="form-control" name="type" id="type">    
			    			         <option value="estudiante">Estudiante</option>
                                     <option value="supervisor">Supervisor</option>
                                     <option value="admin">Administrador</option>
                                     
			    			    </select>
			    			
			    			</div>
                             </div>
                                       
                                       
                                    
			    			</div><!--aqui-->
                        <div class="row" id="subservi">
                             <div class="col-xs-3 col-sm-3 col-md-3">
                                            <div class="form-group">


                                        {{Form::select('sub_id',$subsidio,null, ['class'=>'form-control'])}}
                                            </div>
                               </div>	
                               <div class="col-xs-3 col-sm-3 col-md-3">			
                                            <div class="form-group">


                                        {{Form::select('Servi_id',$servicio,null, ['class'=>'form-control'])}}
                                            </div>
                                 </div>
                                 <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
			    			
                            
			    			    <select class="form-control" name="carrera" id="carrera">    
			    			         <option value="Tecnología en Gestión de la Producción Industrial por Ciclos Propedéuticos">Tecnología en Gestión de la Producción Industrial por Ciclos Propedéuticos</option>
                                     <option value="Tecnología en Electrónica por Ciclos Propedéuticos">Tecnología en Electrónica por Ciclos Propedéuticos</option>
                                     <option value="Tecnología en Construcciones Civiles por Ciclos Propedéuticos">Tecnología en Construcciones Civiles por Ciclos Propedéuticos</option>
                                     <option value="Tecnología en Sistemas Eléctricos de Media y Baja Tensión por Ciclos Propedéuticos">Tecnología en Sistemas Eléctricos de Media y Baja Tensión por Ciclos Propedéuticos</option>
                                     <option value="Tecnología en Sistematización de Datos por Ciclos Propedéuticos">Tecnología en Sistematización de Datos por Ciclos Propedéuticos</option>
                                     <option value="Tecnología en Mecánica por Ciclos Propedéuticos">Tecnología en Mecánica por Ciclos Propedéuticos</option>
                                     
			    			    </select>
			    			
			    			</div>
                            </div>
                            
                        </div>
			    			{{ $x1 = Form::text('x1',null,['id'=>'x1','class'=> 'hidden']) }}
			    			{!!Form::submit('Actualizar',['class'=>'btn btn-info btn-block'])!!}
			    		    
			    	    {!!Form::close()!!}
			    	  
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
@stop