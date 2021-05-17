$(document).ready(function(){
   
      $("#matricula > input, #grupo > input").on("keypress", function () {
         $input=$(this);
         setTimeout(function () {
          $input.val($input.val().toUpperCase());
         },50);
        })

        
    $('#matricula > input').mask('AAAA000000');
    $('#telefono > input').mask('0000000000');
    $('#grupo > input').mask('AAA000');


    $('#nombre > input').keyup(function(evt){
         var txt = $(this).val(); 
          $(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); })); 
        });

        
    $('#ap > input').keyup(function(evt){
        var txt = $(this).val(); 
         $(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); })); 
        });

    $('#am > input').keyup(function(evt){
        var txt = $(this).val(); 
        $(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); })); 
        });



/*---------------------------------------------- Agregar Tutoria------------------------------------------------------------- */


        
   $('#tutoria > input').keyup(function(evt){
    var txt = $(this).val(); 
     $(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); })); 
    });

    $('#encargado > input').keyup(function(evt){
    var txt = $(this).val(); 
    $(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); })); 
    });




/*---------------------------------------------- Agregar Tutoria------------------------------------------------------------- */




    

});
