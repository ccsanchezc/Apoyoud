<style>
    .col-md-12 {
    width: 100%;
} 

.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    background-color: #ECF0F5;
}

.box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
}

.box-header.with-border {
    border-bottom: 1px solid #f4f4f4;
}


.box-header .box-title {
    text-align: center;
    font-size: 20px;
    margin: 0;
    line-height: 1;
}

.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;

}


.box-footer {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #f4f4f4;
    padding: 10px;
    background-color: #fff;
}


.table-bordered {
    border: 1px solid #f4f4f4;
}


.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}

table {
    background-color: transparent;
}

 .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid #f4f4f4;
}


.badge {
    display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #777;
    border-radius: 10px;
}

.bg-red {
    background-color: #dd4b39 !important;
}
</style>
       <div class="row">
       <h2  style="text-align:right"><?=  $fecha2; ?></h2>
        <h1 class="display-3">Reporte de usuario individual  </h1>
        
        <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                
                  <h3 class="display-3">Usuario: {{$user->nombre}}  {{$user->apellido}}</h3>
                <h3 class="display-3">Codigo: {{$user->codigo}}  </h3>
                 <h3 class="display-3">Carrera: {{$user->carrera}}  </h3>
                 <h3 class="display-3">Tipo de subsidio : {{$subsidio}}</h3>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                 
                </div>
              </div><!-- /.box -->
        
        
    
       
  
  
 
</div>     

           <div class="row">
            
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">REPORTE DETALLADO</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                  <thead>
                    
                     <tr>
                      <th style="width: 40px">Codigo</th>
                      <th style="width: 40px">Fecha</th>
                    </tr>
                  </thead>
                    <tbody>
                  @foreach($cuantos as $cuan)
                 
                    <tr>
                      <td style="width: 10px" ><?= $cuan->codigo; ?></td>
                      <td><?= $cuan->fecha; ?></td>
                    </tr>
                    
                     @endforeach
                    
                  </tbody>
                  

                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  
                </div>
              </div><!-- /.box -->
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">TOTAL</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                 <p>Cantidad de almuerzos pedido en total {{$cantidad}}</p>
                 @if($subsidio=="A")
                 <p>Total a pagar $ {{$cantidad*700}} pesos</p>
                 @elseif($subsidio=="B")
                 <p>Total a pagar $ {{$cantidad*1300}} pesos</p>
                 @else($subsidio=="TOTAL")
                  <p>Total a pagar $ 0 pesos </p>
                 @endif
                 
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                </div>
              </div><!-- /.box -->
 </div>
