let $nombre = document.querySelector("#nombre")
let $ap = document.querySelector("#apellido_p")
let $am = document.querySelector("#apellido_m")
let url_base = window.location.origin
console.log(url_base)

const check = (e) => {
    e.preventDefault()
    let nombre = e.target.value.replace(/[<>!?¿$#%&/()=*]/g, '')
    e.target.value = nombre

}
$nombre.addEventListener('keyup', (e) => check(e))
$ap.addEventListener('keyup', (e) => check(e))
$am.addEventListener('keyup', (e) => check(e))

let inputs = document.querySelectorAll('.form-control')

function inputIsEmpty(input) {
    if (document.getElementById(input).value == "") {
        document.getElementById(input).classList.add('is-invalid')
        return true;
    }
    return false
}

inputs.forEach(input => {
    input.addEventListener('click', () => {
        input.classList.remove('is-invalid')
    })
});

let form = document.getElementById('frm-register-prof')

$('#frm-register-prof').submit(function(e) {
    e.preventDefault()
    let inpustEmpty = 0;
    inputs.forEach(input => {
        if (inputIsEmpty(input.id)) {
            inpustEmpty++
        }
    });

    if (inpustEmpty > 0) {
        alertify.error('Debes rellenar todas las cajas de texto')
    }else{
  

        $.ajax({
            url:'validateRegistro',
            type:'post',
            data: $(this).serialize(),
        })
        .done(function(response){
            console.log(response);
            let res = JSON.parse(response)
            postAlert(res)
        })   
        .fail(function(err){
            alert.error("Error temporal")
        })   

    }
})

function postAlert(response){
    console.log(response)
    alertify.success(response.message)
    document.getElementById('content').innerHTML = `
    <div class="alert alert-info text-center" role="alert">
        <p>Esta es tu matricula, anotala para iniciar sesion</p>
        <h2>${response.matricula}</h2>
        <a href="${url_base}/login" class="btn btn-outline-success">iniciar sesion</a>
    </div>
    `
}
