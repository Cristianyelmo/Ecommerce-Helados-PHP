<?php include '../header.php'?>


<section class="flex justify-center
" >




<div class="flex flex-col w-[600px]">


<div class="bg-[#FFFFFF] bg-opacity-30 shadow-custom  m-3 p-4 max-w-xl flex flex-col justify-center">
<?php




/* Script de Mercado Pago */

require '../vendor/autoload.php';
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
    
 
    // Resto del código si la creación es exitosa
} catch (\MercadoPago\Exceptions\MPApiException $e) {
    echo 'Error al crear la preferencia: ' . $e->getMessage();
    
    // Imprimir la respuesta cruda de la API en formato JSON si está disponible
    if (method_exists($e, 'getResponse')) {
        echo 'Respuesta cruda de la API: ' . json_encode($e->getResponse());
    }
}
$preference->back_urls = array(
    "success" => "http://localhost/Ecommerce-Helados/user/buy-now.php",
    "failure" => "http://localhost/Ecommerce-Helados/user/falla.php",
    "pending" => "http://localhost/Ecommerce-Helados/user/falla.php"
);
$preference->auto_return = "approved";

/* Script de Mercado Pago */




/* Script de Carrito Session */

$hola=$_SESSION['contador'];
$total=0;
$hoy = getdate();


$fecha = "" . $hoy['mday'] . "/ " . $hoy['mon'] . " /" . $hoy['year'] . "";




if(isset($_SESSION['cart'])){
 
    foreach($_SESSION['cart'] as  $key =>  $value){
        $total += $value['productPrice'] * $hola;


echo "

<form action='insertCart.php' method='POST'>
<div class='flex justify-center  '>




    <div class='flex justify-center flex-col '>



  







  
        <div class='flex justify-center '>
           

</span>
<img src='../admin/$value[productImage]' alt='' class='w-[35px] mr-[10px]'>
</div>

</div>


<div>


<div class='sm:flex sm:flex-col sm:snap-center sm:ml-[60px] sm:mt-[70px] '>
<button name='remove' class='bg-transparent'><span class='material-symbols-outlined ml-[230px]'>
cancel
</span></button>
<h2 class='text-center font-extrabold'>$value[productName]</h2>
<p class='text-center text-3xl'>$value[productPrice] </p>


<div class='flex justify-center space-x-4 mb-6 mt-6'>
<button name='menos' class='text-black p-4 rounded-full bg-[#D9D9D9] bg-opacity-30 shadow-custom w-[50px] h-[50px]'>-</button>

<div class='bg-[#D9D9D9] bg-opacity-30 p-4 shadow-custom text-black w-[50px] h-[50px] text-center'>
<h3 >$value[productQuantity]</h3>

<input type='hidden' name='item' value='$value[productName]'>
</div>
<button name='mas' class='text-black  p-4 rounded-full bg-[#D9D9D9] bg-opacity-30 shadow-custom w-[50px] h-[50px]'>+</button>
</div>

<input type='hidden' name='name' value='$value[productName]'>
<input type='hidden' name='price' value='$value[productPrice]'> 
<input type='hidden' name='image' value='$value[productImage]'> 

<input type='hidden' name='numero' value='$hola'>


</div>

</div>



<!--  -->


</div>
</form>


<!-- dii -->

";
}

}
/* Script de Carrito Session */
?>

<!--  -->
</div>





<div class="bg-[#FFFFFF] bg-opacity-30 shadow-custom  m-3 p-4 max-w-xl flex flex-col justify-center">


<h2 class="text-center font-extrabold text-3xl">Total</h2>
<h3 class="text-center"><?php echo number_format($total,2)  ?></h3>
<div class="text-center">
<!-- <button name='buy' class="bg-[#E97C8D] p-4 border border-3 border-black rounded-[40.5px] text-center">Buy Now</button> -->
<div id="wallet_container"></div>
</div>

</div>





</div>

</section>

<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>

const mp = new MercadoPago('TEST-37ca75f7-cda7-41ca-801e-0a13bbb29151');
const bricksBuilder = mp.bricks();

mp.bricks().create("wallet", "wallet_container", {
   initialization: {
       preferenceId: '<?php echo $preference->id ?>',
   },
});

</script>



<?php include '../footer.php'?> 