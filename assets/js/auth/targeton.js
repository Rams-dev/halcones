$(document).ready(function(){
    $('#activo').click(function(){
        $(this).html('activo');
        $(this).removeClass('btn-info');
        $(this).addClass('btn-primary');
        $('#desactivo').html('desactivar');
        $('#desactivo').removeClass('btn-danger');
        $('#desactivo').addClass('btn-default');
    })

    $('#desactivo').click(function(){
        $(this).html('desactivado');
        $(this).removeClass('btn-default');
        $(this).addClass('btn-danger');
        $('#activo').html('activar');
        $('#activo').removeClass('btn-primary');
        $('#activo').addClass('btn-default');
        $('#target').hide();
        
    })
});