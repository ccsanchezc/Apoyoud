    $(document).ready(function(){
    $("#buscarpdf").click(function(){
        console.log("hola papu");
       var dato = $("#codigo1").val();
        var tabla1 = $("#tabaladedatos");
        var route = "http://127.0.0.1:8000/admin/pdfuser/"+dato;
        var token = $("#token1").val();
        tabla1.empty()
       console.log("hola papu");
                $.get(route,function(res){
                if(res=='error'){
                      //$("#daralmuerzo").hide();
                       
                        $("#todo").before(
                                        '<div class="alert alert-danger alert-dismissable">'+
                                            '<button type="button" class="close" ' + 
                                                    'data-dismiss="alert" aria-hidden="true">' + 
                                                '&times;' + 
                                            '</button>' + 
                                            'Error estudiante no existe en el programa!' + 
                                         '</div>');
                 }else{
                          
                           $(res).each(function(key,value){
                            tabla1.empty();
                            
                            tabla1.prepend("<tr><td>"+res.codigo.toLocaleString()+"</td><td>"+res.nombre+"</td><td>"+res.apellido+"</td><td>"+res.cantidad+"</td><td><button value="+res.codigo+" id='verdf' OnClick='Mostrar(this);'  class='btn btn-info'><span class='glyphicon glyphicon-eye-open'></span>Ver</button> <button value="+res.codigo+" OnClick='Descargar(this);' class='btn btn-success'><span class='glyphicon glyphicon-download-alt'></span>Descargar</button></td></tr>");
                           
                            });
                       
                       }
                           
                 



              });  
     
        
    });
   
});

function Mostrar(btn){
    
  
    
       var dato = btn.value;
        var route = "http://127.0.0.1:8000/admin/pdfuser/ver/"+dato;
        var token = $("#token1").val();
 
   
    //$('#myModal').modal('show');
    window.open(route, "PDF", "width=800, height=800")
        
   
          
}
function Descargar(btn){
    
    
    
       var dato = btn.value;
        var route = "http://127.0.0.1:8000/admin/pdfuser/download/"+dato;
        var token = $("#token1").val();
 
   
    //$('#myModal').modal('show');
    window.open(route, "PDF", "width=800, height=800")
      
   
    
 
}
