    $(document).ready(function(){
    $("#registro").click(function(){
       var dato = $("#codigoe").val();
        var tabla = $("#datostablae");
        var route = "http://127.0.0.1:8000/super/entrega/"+dato;
        var token = $("#token").val();
        tabla.empty()
       
                $.get(route,function(res){
                if(res=='error'){
                      //$("#daralmuerzo").hide();
                       $("#daralmuerzo").attr("disabled",true);
                        $("#todo").before(
                                        '<div class="alert alert-danger alert-dismissable">'+
                                            '<button type="button" class="close" ' + 
                                                    'data-dismiss="alert" aria-hidden="true">' + 
                                                '&times;' + 
                                            '</button>' + 
                                            'Error estudiante no existe en el programa!' + 
                                         '</div>');
                 }else{
                       if(res=='ya'){
                           console.log("usuario ya tomo almuerzo");
                                  $("#todo").before(
                                                '<div class="alert alert-warning alert-dismissable">'+
                                                    '<button type="button" class="close" ' + 
                                                            'data-dismiss="alert" aria-hidden="true">' + 
                                                        '&times;' + 
                                                    '</button>' + 
                                                    'El estudiante ya tomo almuerzo hoy!' + 
                                                 '</div>');
                           
                       }else{
                           console.log("oiga");
                           $(res).each(function(key,value){
                            tabla.empty();
                            $("#daralmuerzo").show();
                            tabla.prepend("<tr><td>"+res.codigo.toLocaleString()+"</td><td>"+res.nombre+"</td><td>"+res.apellido+"</td><td>"+res.carrera+"</td></tr>");
                           
                            });
                        $("#daralmuerzo").attr("disabled",false);
                       }
                           
                 }



              });  
        function toggleAlert(){
            $(".alert").toggleClass('in out'); 
                return false; // Keep close.bs.alert event from removing from DOM
            }


        $("#btn").on("click", toggleAlert);
        $('#bsalert').on('close.bs.alert', toggleAlert)
        
    });
    $("#daralmuerzo").click(function(){
       var dato1 = $("#codigoe").val();
        var route = "http://127.0.0.1:8000/super/entrega/";
        var token = $("#token").val();
        var fecha  = new Date();
        var month = fecha.getMonth()+1;
        var day = fecha.getDate();
        var year = fecha.getFullYear();
        var horas= fecha.getHours();
        var minutos = fecha.getMinutes();
        var segundos = fecha.getSeconds();
        var tabla = $("#datostablae");
        fecha = year+"-"+month+"-"+day+" "+horas+":"+minutos+":"+segundos;
      
   $.ajax({
       
       url:route,
       headers: {'X-CSRF-TOKEN':token},
       type:'POST',
       dataType: 'json',
       data:{codigo:dato1,fecha:fecha}
        
        
   }) ;
        tabla.empty();
        $("#daralmuerzo").attr("disabled",true);
        $("#codigoe").val("");
        $("#todo").before(
                                                '<div class="alert alert-success alert-dismissable">'+
                                                    '<button type="button" class="close" ' + 
                                                            'data-dismiss="alert" aria-hidden="true">' + 
                                                        '&times;' + 
                                                    '</button>' + 
                                                    'Estudiante registrado !' + 
                                                 '</div>');
  });  
    
    
});
