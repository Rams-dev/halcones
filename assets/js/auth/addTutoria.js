(function($){

	$('#f-add-tutoria').submit(function(ev){
		$.ajax({
			url: 'agregartutoria/addTutoria',
			dataType: 'JSON',
			type: 'POST',
			data: $(this).serialize(),
			success: function(response){
				alertify.success(response.mensaje);
				setTimeout(function(){
					location.reload();
				}, 1000)
				

			},
			statusCode:{
				400: function(xhr){
					$('#tutoria > input').removeClass('is-invalid');
					$('#encargado > input').removeClass('is-invalid');
					
					var json = JSON.parse(xhr.responseText);
					if(json.tutoria.length != 0){
						$('#tutoria > div').html(json.tutoria);
						$('#tutoria> input').addClass('is-invalid')
					}
					if(json.encargado.length != 0){
						$('#encargado > div').html(json.encargado);
						$('#encargado > input').addClass('is-invalid')
					}
				
				},
				 401: function(xhr){

				}
			}
		});
		ev.preventDefault();
	});


})(jQuery);