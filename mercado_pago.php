
<?php
session_start();
require 'vendor/autoload.php';
use MercadoPago\MercadoPagoConfig;

// Agrega credenciales
MercadoPagoConfig::setAccessToken('TEST-3595623694248600-111320-f1fe6a0c6633f5efe8d0d4d76506a75b-424046411');





$items=array();

// Iterar sobre cada producto y agregarlo al array de ítems
if ($_SESSION['cart'] !== null) {
    foreach ($_SESSION['cart'] as $key => $value) {
       

        $items[] = array(
            "title" => "$value[productName]",
            "quantity" => floatval($value['productQuantity']),
            
            "currency_id" => "BRL",
            "unit_price" => floatval($value['productPrice'])
        );
    }
} else {
    echo 'El carrito está vacío.';
}


$client = new MercadoPago\Client\Preference\PreferenceClient();

try {
    
    $preference = $client->create([
        "items" => $items
    ]);
    print_r($items);
 
    // Resto del código si la creación es exitosa
} catch (\MercadoPago\Exceptions\MPApiException $e) {
    echo 'Error al crear la preferencia: ' . $e->getMessage();
    
    // Imprimir la respuesta cruda de la API en formato JSON si está disponible
    if (method_exists($e, 'getResponse')) {
        echo 'Respuesta cruda de la API: ' . json_encode($e->getResponse());
    }
}
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<script src="https://sdk.mercadopago.com/js/v2"></script>

<div id="wallet_container"></div>
<script>

const mp = new MercadoPago('TEST-37ca75f7-cda7-41ca-801e-0a13bbb29151');
const bricksBuilder = mp.bricks();

mp.bricks().create("wallet", "wallet_container", {
   initialization: {
       preferenceId: '<?php echo $preference->id ?>',
   },
});



</script>




</body>
</html>