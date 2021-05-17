$(document).ready(function(){
    $('#lunes').hide();
    $('#martes').hide();
    $('#miercoles').hide();
    $('#jueves').hide();
    $('#viernes').hide();
    $('#limite').hide();
     $('#lu').click(function(){
       $('#lunes').slideToggle();
     });

     $('#ma').click(function(){
        $('#martes').slideToggle();
      });

      $('#mi').click(function(){
        $('#miercoles').slideToggle();
      });

      $('#ju').click(function(){
        $('#jueves').slideToggle();
      });

      $('#vi').click(function(){
        $('#viernes').slideToggle();
      });
      $('#lim').click(function(){
        $('#limite').slideToggle();
      });
});