	let formInputs = document.querySelectorAll('.form-control')
	formInputs.forEach(input => {
		input.addEventListener('click',() => {
			input.classList.remove = 'is-invalid'
		})
	});

	$('#registroUsuarios').submit(function(ev){

		ev.preventDefault();

			$.ajax({
			url: 'registrarUsuario',
			datatype: 'JSON',
			type: 'POST',
			data: $(this).serialize(),
			success: function(response){
				var json = JSON.parse(response)
				alertify.success(json.mensaje);
				setTimeout(function(){
					window.location.replace('../');
				}, 1000)
					
			},
			statusCode:{
				400: function(xhr){
					
					var response = JSON.parse(xhr.responseText);
					for(let res in response){
						console.log(res)
						if(response[res] != ""){
							document.getElementById(res).querySelector('input').classList.add('is-invalid')
							document.getElementById(res).querySelector('div').innerHTML = response[res]
						}
					}

				}
			}
		});

	});
