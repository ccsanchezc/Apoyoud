@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row" >
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading ">LOGIN</div>
                <div class="panel-body" >
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button id="btn-log" type="submit" class="btn btn-success btn-lg" disabled  >
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Olvido su contraseña?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="map"></div>
@stop
@section('scripts2')
   <script type="text/javascript">
  

$(document).ready(function() {
  // Instrucciones a ejecutar al terminar la carga
var coords = {};    //coordenadas obtenidas con la geolocalización
          //NUEVOS VALORES 
    var limitex1 ="-74.156632" ;//longitud
    var limitex2 ="-74.160108" ;//longitud
    var limitey1 ="4.580775999999999" ;//latitud
    var limitey2 ="4.577896100000000" ;//latitud   

             
    /*var limitex1 ="-74.157374" ;//longitudESTOS SON DE LA U
    var limitex2 ="-74.158809" ;//longitudESTOS SON DE LA U
    var limitey1 ="4.579590429999999" ;//latitudESTOS SON DE LA U
    var limitey2 ="4.578740200000000" ;//latitudESTOS SON DE LA U*/
    /*
  var limitex1 ="-74.070074" ;//longitud prueba
   var limitex2 ="-74.074763" ;//longitud prueba 
   var limitey1 ="4.711934899999999" ;//latitud prueba 
   var limitey2 ="4.709021160000000" ;//latitud prueba*/
if (!navigator.geolocation){
    window.alert("Geolocalización no soportada en este navegador");
    return;
  }

  navigator.geolocation.getCurrentPosition(
          function (position){
              coords =  {
              lng: position.coords.longitude,
              lat: position.coords.latitude
            };
              
               if(coords.lat < limitey1 && coords.lat>limitey2 ){
                       

                            if(coords.lng < limitex1 && coords.lng>limitex2 ){
                     

                                 window.alert("Usted esta dentro del rango de la Universidad Francisco Jose de Caldas Facultad Tecnologica");
                                $("#btn-log").attr("disabled",false);
                                 
                            } else{
                                window.alert("Usted esta fuera del rango de la Universidad Francisco Jose de Caldas Facultad Tecnologica");
                            $("#btn-log").attr("disabled",true);
                            }    



                    }else{

                        window.alert("Usted esta fuera del rango de la Universidad Francisco Jose de Caldas Facultad Tecnologica");
                    }  
           
          },function(error){console.log(error);});

  
   
          

   

       



                     
                   
              



 

  navigator.geolocation.getCurrentPosition(success, error);






});
        
        
</script>

@stop
