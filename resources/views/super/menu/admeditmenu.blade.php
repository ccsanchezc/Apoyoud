@extends('layouts.admin')
@section('content')
<div class="container">
      
        <div class="row centered-form">
        <div class="center">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Editar Menú </h3>
			 			</div>
			 			<div class="panel-body">
			    		{!!Form::model($menu,['route'=>['menu.update',$menu->id],'method'=>'PUT'])!!}
			    		 <div class="row">
                           		<div class="form-group">
                            	 {!!Form::text('plato_fuerte',null,['id'=>'plato_fuerte', 'class'=>'form-control ','placeholder'=>'Plato fuerte'])!!}
			               
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
                           		<div class="form-group">
                            	 {!!Form::text('sopa',null,['id'=>'sopa', 'class'=>'form-control ','placeholder'=>'Sopa'])!!}
			               
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						{!!Form::text('postre',null,['id'=>'postre', 'class'=>'form-control','placeholder'=>'Postre'])!!}
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    {!!Form::text('jugo',null,['id'=>'jugo', 'class'=>'form-control','placeholder'=>'Jugo'])!!}
                                </div>
                                </div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    				<div class="form-group">
			    	            {!!Form::text('cantitotal',null,['id'=>'cantitotal', 'class'=>'form-control','placeholder'=>'Cantidad total de almuerzos'])!!}
			    	       		 </div>
			    				</div>
                                   
			    			</div>   
			    		
			    	    {!!Form::submit('Actualizar',['class'=>'btn btn-info btn-block'])!!}
			    		    
			    	    {!!Form::close()!!}
			    	  
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
@stop