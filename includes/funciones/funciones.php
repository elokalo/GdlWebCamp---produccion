
<?php 

function productos_json(&$boletos, &$camisas=0, &$etiquetas=0){ //Paso por referencia en PHP se asigna con "&"
    $dias = array(0 => 'un_dia', 1 => 'pase_completo', 2 => 'dos_dias');

    //Eliminamos el valor de 'precio' del boleto o boletos seleccionados con la funcion 'unset' dado que no lo necesitamos adjuntar en la base de datos
    unset($boletos['un_dia']['precio']);
    unset($boletos['pase_completo']['precio']);
    unset($boletos['dos_dias']['precio']);

    $total_boletos_extras = array_combine($dias, $boletos); //Combinamos ambos arreglos, pasando los valores de "$boletos" como las llaves de "$dias"

    //Creamos una iteracion que como tal crea nuestro JSON a partir de los datos recibidos en la funcion
    foreach($total_boletos_extras as $key => $boleto){
        if($boleto > 0){ //Verificamos que si tiene el valor de 0 alguno de los boletos este no se guarde en la BD, para eso convertimos a int el valor porque lo muestra como string
            $total_boletos_extras[$key] = (int)$boleto['cantidad']; //Agregamos los elementos del arreglo a JSON
        } //Fin if
    }

    $camisas = (int)$camisas['cantidad'];

    if($camisas >0){ //Si no tiene datos, si es '0' no sera guardado
        $total_boletos_extras['camisas'] = $camisas;
    }

    $etiquetas = (int)$etiquetas['cantidad'];

    if($etiquetas >0){
        $total_boletos_extras['etiquetas'] = $etiquetas;
    }

    return json_encode($total_boletos_extras); //retornamos el arreglo en forma de cadena de texto de JSON
}

function eventos_json(&$eventos){
    $eventos_json = array();
    foreach($eventos as $evento){
        $eventos_json['eventos'][] = $evento;
    }

    return json_encode($eventos_json);
}

?>