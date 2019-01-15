$(document).ready(function () {
    $('#login-admin').on('submit', function(e){
        e.preventDefault();
        
        //Obtenemos los datos de ese formulario en forma de arreglo serializado
        let datos = $(this).serializeArray();

        //Creamos el llamado a AJAX con jQuery
        
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: datos,
            dataType: "json",
            success: function (data) {
                let resultado = data;
                if(resultado.respuesta==='exitoso'){
                    Swal({
                        type: 'success',
                        title: 'Login Exitoso!',
                        text: 'Bienvenid@ '+resultado.usuario+ '!!'
                    }).then(() => {
                        setTimeout(function(){
                            window.location.href= "admin-area.php";
                        }, 1000);
                    });
                } else {
                    Swal({
                        type: 'error',
                        title: 'Error!',
                        text: 'Datos Incorrectos'
                    });
                }   
            }
        });
    });
});