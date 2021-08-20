let formLoginInputs = document.querySelectorAll('.form-control')

formLoginInputs.forEach((input) => {
	input.addEventListener('click', (e) => {
		input.classList.remove('is-invalid')
		document.getElementById('alert').innerHTML = ''
	})

})

$('#form_login').submit(function(ev){
	ev.preventDefault();
				
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
				let response = JSON.parse(xhr.responseText);

				for(let res in response){
					if(response[res] != ""){
						document.querySelector(`#${res}`).querySelector('input').classList.add('is-invalid')
						document.querySelector(`#${res}`).querySelector('div').innerHTML = response[res]
					}
				}
			},
			401: function(xhr){
				var json = JSON.parse(xhr.responseText);
				$('#alert').html('<div class="alert alert-danger" role="alert"> '+ json.mensaje + '</div>');
			}
		}
	});
});
