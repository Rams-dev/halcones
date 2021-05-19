let $data = document.querySelectorAll('.form-control')


function isEmpty(field){
    if(field == undefined){
        return true
    }
}

function validar(){
    let count = 0;
    for(let i=0; i<$data.length; i++){
        console.log($data[i].value)
         if(isEmpty($data[i].value)){
            count++
         }
    }
    return count
}

console.log(validar())


$("#frm-update").submit(function(e){
    if(validar() > 0){
        alertify.error('rellena todos los campos')
        return 0
    }
        
        e.preventDefault();

        $.ajax({
            url:$(this).attr("action"),
            data:$(this).serialize(),
            dataType:'JSON',
            type:'post',
        })
        .done(function(response){
            alertify.success(response)

            console.log(response)

        })
        .fail(function(err){
            console.log(err);
        })
    })