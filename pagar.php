<?php 

//Si al enviar el POST no tiene estos dos parametros se mandara un error
if(!isset($_POST['submit'])){
    exit("Hubo un error");
}

//Importamos las clases que instanciemos utilizando name space
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

require 'includes/paypal.php';

if(isset($_POST['submit'])): 
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];    
    $email = $_POST['email'];
    $regalo = $_POST['regalo'];
    $total = $_POST['total_pedido'];
    date_default_timezone_set('America/Mexico_City');
    $fecha = date('Y-m-d H:i:s');

    //Pedidos boletos
    $boletos = $_POST['boletos'];
    $numero_boletos = $boletos;

    //Pedidos extras, camisas y etiquetas
    $pedido_extra = $_POST['pedido_extra'];
    $camisas = $_POST['pedido_extra']['camisas']['cantidad'];
    $precioCamisa = $_POST['pedido_extra']['camisas']['precio'];
    $etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];
    $precioEtiquetas = $_POST['pedido_extra']['etiquetas']['precio'];

    include_once 'includes/funciones/funciones.php';
    $pedido = productos_json($boletos, $camisas, $etiquetas);

    //Eventos
    $eventos = $_POST['registro'];
    $registro = eventos_json($eventos);

    try {
        require_once('includes/funciones/bd_conexion.php');
        if($stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)")){ //Utilizamos un 'Prepared Statement' para insertar valores en la BD, en la parte de 'prepare' le estamos informando a la BD que se prepare para ejecutar la consulta de SQL.
        //El 'Prepared Statement' nos otorga segurdidad para evitar MySQL insertion es decir que metan datos corrutps a nuestra BD
        $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total); //Para insertar los registros a nuestra BD utilizamos POO (->) en PHP con la funcion "bind_param", aqui debemos asegurarnos a que tipo de dato corresponde, el unico que sera 'int (s)' como tal seria la variable $regalo que es la que se asociara con el campo/columna de 'regalo' de la tabla 'registrados', los otros campos/columnas son strings es por eso que se colocaron 7 's' y solo una 'i' de int
        $stmt->execute();
        $id_registro = $stmt->insert_id;
        $stmt->close(); //Prevenimos insercion de SQL
        $conn->close(); //Cerramos la conexion para evitar que un exceso de conexiones tumben el servidor
        } else {
            //Esto nos ayuda a verificar la conexion ademas de darnos ayuda
            $error = $conn->error . ' ' . $conn->error;
            echo $error;
        }
        //NOTA IMPORTANTE: Para asegurarnos de que no tengamos registros repetidos al recargar esta pagina "validar_registro.php" debemos colocar todo nuestro codigo al inicio, antes de cargar todo el "header.php" antes de cargar el HTML en si. Una vez hecho eso utilizamos la funcion "header("Location:")" donde dentro de "Location:" colocaremos la pagina a la cual se redireccionara al terminar nuestro registro utilizando propiedades del metodo GET (?) aseguramos que no existan registros duplicados.
        //header('Location: validar_registro.php?exitoso=1'); 
    } catch (\Exception $e) {
        echo $e->getMessage();
    }

endif; //If del 'submit'

$compra = new Payer(); //Creamos un objeto de tipo 'pago'
$compra->setPaymentMethod('paypal'); //El tipo de pago sera 'paypal'

//Creamos un nuevo Item, seteando el nombre del producto, el tipo de moneda de pago, la cantidad y el precio
/*$articulo = new Item();
$articulo->setName($producto)
        ->setCurrency('MXN')
        ->setQuantity(1)
        ->setPrice($precio);*/

//Iteramos en un arreglo nuestro numero de boletos y creamos nuestras variables de forma dinamica
$i=0;
$arreglo_pedido = array();

foreach($numero_boletos as $key => $value){
    if((int) $value['cantidad'] > 0){
        ${"articulo$i"} = new Item();
        $arreglo_pedido[] = ${"articulo$i"};
        ${"articulo$i"} ->setName("Pase: ". $key)
                        ->setCurrency('USD')
                        ->setQuantity((int) $value['cantidad'])
                        ->setPrice((float) $value['precio']);
        $i++;
    }   
}

//Con el mismo formato ahora itermos nuestros pedidos extras que son las camisas y las etiquetas
foreach($pedido_extra as $key => $value){
    if((int) $value['cantidad'] > 0){

        if($key == 'camisas'){
            $precio = (float) $value['precio'] * 0.93;
        } else {
            $precio = (float) $value['precio'];
        }

        ${"articulo$i"} = new Item();
        $arreglo_pedido[] = ${"articulo$i"};
        ${"articulo$i"} ->setName("Extras: ". $key)
                        ->setCurrency('USD')
                        ->setQuantity((int) $value['cantidad'])
                        ->setPrice((float) $precio);
        $i++;
    }   
}

//Creamos una lista de articulos que seran pagados, en este caso agregamos a un arreglo los boletos comprados, las camisas y las etiquetas
$listaArticulos = new ItemList();
$listaArticulos->setItems($arreglo_pedido);

//Creamos la cantidad total, aqui no es necesario crear un subtotal y especificar el envio 
$cantidad = new Amount();
$cantidad->setCurrency('USD')
        ->setTotal($total);


//Definimos el contrato de un pago, en el caso de 'uniqid' PHP nos genera un 'id' para poder crear la transaccion
$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
            ->setItemList($listaArticulos)
            ->setDescription('Pago GdlWebCamp')
            ->setInvoiceNumber($id_registro);

//URL's para redireccionar despues del pago o cuando cancelamos el pago
$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO."/pago_finalizado.php?id_pago={$id_registro}")
            ->setCancelUrl(URL_SITIO."/pago_finalizado.php?id_pago={$id_registro}");

//Permite crear, procesar y pagar los pagos
$pago = new Payment();
$pago->setIntent("sale")
    ->setPayer($compra)
    ->setRedirectUrls($redireccionar)
    ->setTransactions(array($transaccion));

try {
    //Asociamos toda la informacion del Pago a la REST API que creamos
    $pago->create($apiContext);
} catch (PayPal\Exception\PayPalConnectionException $pce) {
    echo "<pre>";
    print_r(json_decode($pce->getData()));
    exit;
    echo "</pre>";
}

//Obtenemos el enlace de aprobacion
$aprobado = $pago->getApprovalLink();

header("Location: {$aprobado}");
?>
