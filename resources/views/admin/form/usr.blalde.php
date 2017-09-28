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
			    			<div class="form-group">
			    			{!!Form::text('direccion',null,['id'=>'direccion', 'class'=>'form-control','placeholder'=>'Dirección'])!!}
			    	    </div>
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