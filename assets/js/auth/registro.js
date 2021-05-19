(function($){
	$('#nombre > input').focus(function(){
		$('#nombre > input').removeClass('is-invalid');
	});
	$('#ap > input').focus(function(){
		$('#ap > input').removeClass('is-invalid');
	});
	$('#am > input').focus(function(){
		$('#am > input').removeClass('is-invalid');
	});
	$('#carrera > input').focus(function(){
		$('#carrera > select').removeClass('is-invalid');				
	});
	$('#grupo > input').focus(function(){
		$('#grupo > input').removeClass('is-invalid');					
	});
	$('#matricula > input').focus(function(){
		$('#matricula > input').removeClass('is-invalid');			
	});
	$('#telefono > input').focus(function(){
		$('#telefono > input').removeClass('is-invalid');
	});
	$('#contrasena > input').focus(function(){
		$('#contrasena > input').removeClass('is-invalid');
	});
	$('#registroUsuarios').submit(function(ev){
			$.ajax({
			url: 'registrarUsuario',
			datatype: 'JSON',
			type: 'POST',
			data: $(this).serialize(),
			success: function(response){
				var json = JSON.parse(response)
				console.log(json);
				alertify.success(json.mensaje);
				setTimeout(function(){
					window.location.replace('../');
				}, 1000)
					
			},
			statusCode:{
				400: function(xhr){
					$('#nombre > input').removeClass('is-invalid');
					$('#ap > input').removeClass('is-invalid');
					$('#am > input').removeClass('is-invalid');
					$('#carrera > select').removeClass('is-invalid');
					$('#grupo > input').removeClass('is-invalid');
					$('#matricula > input').removeClass('is-invalid');
					$('#telefono > input').removeClass('is-invalid');
					$('#contrasena > input').removeClass('is-invalid');
					var json = JSON.parse(xhr.responseText);
					console.log(json)
					if(json.nombre.length != 0){
						$('#nombre > div').html(json.nombre);
						$('#nombre > input').addClass('is-invalid');
					}
					if(json.ap.length != 0){
						$('#ap > div').html(json.ap);
						$('#ap > input').addClass('is-invalid');
					}
					if(json.am.length != 0){
						$('#am > div').html(json.am);
						$('#am > input').addClass('is-invalid');
					}
					if(json.carrera.length != 0){
						$('#carrera > div').html(json.carrera);
						$('#carrera > select').addClass('is-invalid');
					}
					if(json.grupo.length != 0){
						$('#grupo > div').html(json.grupo);
						$('#grupo > input').addClass('is-invalid');
					}
					if(json.matricula.length != 0){
						$('#matricula > div').html(json.matricula);
						$('#matricula > input').addClass('is-invalid');
					}
					if(json.telefono.length != 0){
						$('#telefono > div').html(json.telefono);
						$('#telefono > input').addClass('is-invalid');
					}
					if(json.contrasena.length != 0){
						$('#contrasena > div').html(json.contrasena);
						$('#contrasena > input').addClass('is-invalid');
					}
				}
			}
		});
				ev.preventDefault();

	});

	})(jQuery);