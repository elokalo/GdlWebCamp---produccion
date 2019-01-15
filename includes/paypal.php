<?php 

require 'paypal/autoload.php';

define('URL_SITIO', 'http://localhost/GDLWebCamp/');


//Instalacion del SDK en nuestra API
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        //Cliente ID
        'AbtcwR03D8Vjwr2ZpxBYQgYLTiBy716YXEavmvay5WQCs3fX6CUBpzUnOlL3JVF39Ml4DVmwHQBwt98v',
        //Secret
        'EJA9Lax8UTl9H1orHgNHSP8Bok_KTEO6VbQeWErkkCAFNCOKh0O9mz5oBq7xr96myZSmNzS-BUr0o0Qz'
    )
);


?>