$(document).ready(function () {
    $('#guardar-registro').on('submit', function(e){
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
                if(resultado.respuesta==='exito'){
                    Swal({
                        type: 'success',
                        title: 'Exitoso!',
                        text: 'Se guardó correctamente'
                    });
                } else {
                    Swal({
                        type: 'error',
                        title: 'Error!',
                        text: 'Hubo un error'
                    });
                }   
            }
        });
        
    });

    //Agregar un registro cuando hay un archivo
    $('#guardar-registro-archivo').on('submit', function(e){
        e.preventDefault();
        //Obtenemos los datos de ese formulario en forma de arreglo serializado
        let datos = new FormData(this);

        //Creamos el llamado a AJAX con jQuery
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: datos,
            dataType: "json",
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            success: function (data) {
                let resultado = data;
                if(resultado.respuesta==='exito'){
                    Swal({
                        type: 'success',
                        title: 'Exitoso!',
                        text: 'Se guardó correctamente'
                    });
                } else {
                    Swal({
                        type: 'error',
                        title: 'Error!',
                        text: 'Hubo un error'
                    });
                }   
            }
        });
        
    });

    //Eliminar un registro
    //Hacemos un modelo mas inteligente para poder reutilizar esta funcion para borrar eventos, administradores, etc
    $('.borrar_registro').on('click', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        let tipo = $(this).attr('data-tipo'); //sera del tipo 'admin', 'evento', etc.
        Swal({
            title: 'Estás Seguro?',
            text: "Un registro eliminado no se puede recuperar!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if(result.value){
                $.ajax({
                    type:'post',
                    data:{
                        'id': id,
                        'registro': 'eliminar'
                    },
                    url: 'modelo-'+tipo+'.php',
                    dataType: 'json',
                    success:function(data){
                        let resultado = data;
                        if(resultado.respuesta==='exito'){
                            Swal(
                                'Eliminado!',
                                'Registro Eliminado.',
                                'success'
                            );
                            jQuery(`[data-id="${resultado.id_eliminado}"]`).parents('tr').remove();
                        } 
                    }
                })
            } else {
                Swal({
                    type: 'error',
                    title: 'Error!',
                    text: 'No se pudo eliminar'
                });
            }
        });
    });
});