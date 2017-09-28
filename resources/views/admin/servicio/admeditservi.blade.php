@extends('layouts.admin')


@section('content')

<div class="container">
      
        <div class="row centered-form">
        <div class="center">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Editar Servicio <small> Apoyo alimentario</small></h3>
			 			</div>
			 			<div class="panel-body">
			    		{!!Form::model($serviciosocial,['route'=>['serviA.update',$serviciosocial->id],'method'=>'PUT'])!!}
			    		     
                            
			    			<div class="form-group">
			    				{!!Form::text('nombre',null,['id'=>'nombre', 'class'=>'form-control','placeholder'=>'Nombre'])!!}
			    			</div>

			    			<div class="form-group">
			    			{!!Form::text('descripcion',null,['id'=>'descripcion', 'class'=>'form-control','placeholder'=>'Descripción'])!!}
			    	    </div>
			    			
			    		   
			    			{!!Form::submit('Registrar',['class'=>'btn btn-info btn-block'])!!}
			    		    
			    	    {!!Form::close()!!}
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>

@stop