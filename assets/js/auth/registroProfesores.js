let $nombre = document.querySelector("#nombre")
let $ap = document.querySelector("#apellido_p")
let $am = document.querySelector("#apellido_m")

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

let registerBtn = document.getElementById('registerBtn')

registerBtn.addEventListener('click', function(e) {
    e.preventDefault()
    let inpustEmpty = 0;
    inputs.forEach(input => {
        if (inputIsEmpty(input.id)) {
            inpustEmpty++
        }
    });

    if (inpustEmpty > 0) {
        alertify.error('Debes rellenar todas las cajas de texto')
        return 0
    }
})