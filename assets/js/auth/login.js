(function($){
	$('#form_login').submit(function(ev){
		 $('#matricula > input').focus(function(){
		 	$('#matricula > input').removeClass('is-invalid');
		 });

		 $('#passsword > input').focus(function(){
		 	$('#password > input').removeClass('is-invalid');
		 });
		 
		$.ajax({
			url: 'login/validate',
			datatype: 'JSON',
			type: 'POST',
			data: $(this).serialize(),
			success: function(response){
				var json = JSON.parse(response);

				window.location.replace(json.url);

			},
			statusCode: {
				400: function(xhr){
					$('#matricula > input').removeClass('is-invalid');
					$('#password > input').removeClass('is-invalid');
					var json = JSON.parse(xhr.responseText);
					if(json.matricula.length != 0){
						$('#matricula > div').html(json.matricula)
						$('#matricula > input').addClass('is-invalid');
					}
					if(json.password.length != 0){
						$('#password > div').html(json.password)
						$('#password > input').addClass('is-invalid');
					}
				},
				401: function(xhr){
					var json = JSON.parse(xhr.responseText);
					console.log(json);
					$('#alert').html('<div class="alert alert-danger" role="alert"> '+ json.mensaje + '</div>');
				}

			}

		});
		ev.preventDefault();

	});

})(jQuery);