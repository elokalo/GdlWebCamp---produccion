$(document).ready(function () {
    $('.sidebar-menu').tree();

    //Personalizamos y traducimos el Datatable de "Ver Todos"
    $('#registros').DataTable({
      'paging'      : true,
      'pageLength'  : 10,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'language'    :{
          paginate:{
              next: 'Siguiente',
              previous: 'Anterior',
              last: 'Último',
              first: 'Primero'
          },
          info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
          emptyTable: 'No hay registros',
          infoEmpty: '0 Registros',
          search: 'Buscar'
        }
    });
});

    //Deshabilitamos el boton 'submit' hasta que ambas contraseñas sean iguales
    $('button#crear_registro_admin').attr('disabled', 'disabled');

    //Comprobamos que las contraseñas sean iguales, si las contraseñas de 'login.php' son diferentes no enviara el formulario, si son iguales si lo enviara
    $('#repetir_password').on('input', function () { 
        let passwordNuevo = $('#password').val();

        if($(this).val() == passwordNuevo){
            $('#resultado_password').text('Correcto');
            $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('button#crear_registro_admin').removeAttr('disabled'); //Habilitamos el boton 'submit'
        } else {
            $('#resultado_password').text('No son iguales!');
            $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
            $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
        }
     });

//Date picker
$('#fecha').datepicker({
    autoclose: true
});

//Initialize Select2 Elements
$('.seleccionar').select2();

//Timepicker
$('.timepicker').timepicker({
    showInputs: false
});

//Lista de iconos de fontawesome
$('#icono').iconpicker();

//iCheck for checkbox and radio inputs
//Flat red color scheme for iCheck
$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_flat-blue',
    radioClass   : 'iradio_flat-blue'
});

$.getJSON("servicio-registrados.php", function (data) {
    // LINE CHART
    var line = new Morris.Line({
    element: 'grafica_registros',
    resize: true,
    data: data,
    xkey:'fecha',
    parseTime: false,
    ykeys: ['cantidad'],
    labels: ['fecha'],
    lineColors: ['#3c8dbc'],
    hideHover: 'auto'
  });
});

