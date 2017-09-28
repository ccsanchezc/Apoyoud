@extends('layouts.admin')


@section('content')

<div class="container">
      
        <div class="row centered-form">
        <div class="center">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Editar Subsidio</h3>
			 			</div>
			 			<div class="panel-body">
			    		{!!Form::model($subsidio,['route'=>['sub.update',$subsidio->id],'method'=>'PUT'])!!}
			    		     
                            
			    			<div class="form-group">
			    				{!!Form::text('descripcion',null,['id'=>'descripcion', 'class'=>'form-control','placeholder'=>'Descripción del tipo de subsidio'])!!}
			    			</div>

			    			<div class="form-group">
			    			{!!Form::text('type',null,['id'=>'type', 'class'=>'form-control','placeholder'=>'Tipo de subsidio'])!!}
			    	    </div>
			    			
			    		   
			    			{!!Form::submit('Actualizar',['class'=>'btn btn-info btn-block'])!!}
			    		    
			    	    {!!Form::close()!!}
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>

@stop