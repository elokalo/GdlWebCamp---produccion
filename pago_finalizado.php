             
<?php include_once 'includes/templates/header.php';

use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Payment;

require_once 'includes/paypal.php';

?>

<section class="seccion contenedor">

    <h2>Resúmen del Registro</h2>

    <?php 
        $respuesta ="";
        if(isset($_GET['id_pago'])){
            $id_pago = (int) $_GET['id_pago'];
        }
        if(isset($_GET['paymentId'])){
            $paymentID = $_GET['paymentId'];
            
            //Peticion a REST API

            //Utilizando 'Payment' llamamos un metodo estatico, le estamos diciendo que ID ($paymentID) queremos revisar que ya pago y definimos las credenciales para iniciar sesion en el servidor de PayPal
            $pago = Payment::get($paymentID, $apiContext);
            //Utilizando 'PaymentExecution' para saber el pago que queremos
            $execution = new PaymentExecution();
            $execution->setPayerId($_GET['PayerID']);
            //Resultado tiene la informacion de la transaccion
            $resultado = $pago->execute($execution, $apiContext);
            $respuesta = $resultado->transactions[0]->related_resources[0]->sale->state;
        }

        //var_dump($respuesta); //Respuesta = 'completed'
        
        if($respuesta==="completed"){
            echo "<div class='resultado correcto'>";
                echo "El pago se realizo correctamente <br>";
                echo "El ID de su pago es {$paymentID}";
            echo "</div>";

            require_once('includes/funciones/bd_conexion.php');
            $stmt = $conn->prepare('UPDATE registrados SET pagado =? WHERE id_registrado=?');
            $pagado=1;
            $stmt->bind_param('ii', $pagado, $id_pago);
            $stmt->execute();
            $stmt->close();
            $conn->close();

        } else {
            echo "<div class='resultado error'>";
                echo "El pago no se realizo correctamente";
            echo "</div>";
        }
        
    ?>

</section>

<?php include_once 'includes/templates/footer.php'?>