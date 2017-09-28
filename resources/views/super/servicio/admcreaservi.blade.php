@extends('layouts.admin')


@section('content')
@if(count($errors) > 0)
   <div class="alert alert-danger" role="alert">
   <ul>
   @foreach($errors->all() as $error)
   		<li>{{ $error}}</li>
   @endforeach
   </ul>
</div>
@endif
<div class="container">
      
        <div class="row centered-form">
        <div class="center">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Registrar Servicio</h3>
			 			</div>
			 			<div class="panel-body">
			    		{!!Form::open(['route'=>'servi.store','method'=>'POST'])!!}
			    		     
                            
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