<?php

/* se inicia session cart */
session_start();

/* si existe el la session userxd  */
if(isset($_SESSION['userxd'])){
/* se extre lo que viene por name en el index.php o en la categoria.php */
$product_name=$_POST['name'];
$product_price=$_POST['price'];
$product_image=$_POST['image'];
/* se agrega la session contador con el valor 1 */
$_SESSION['contador'] = 1;

$product_quantity=1;

/* Script Agregar Productos */
if(isset($_POST['addCart'])){

/* si se agrega un producto se hace click en el formulario con con el name addCart */
    if(isset($_SESSION['cart'])){
        /* si ya existe la session cart haces una variable en donde busque en la session cart el valor productName  */
        $check_product=array_column($_SESSION['cart'],'productName');
        /* ahora comparas si coinciden lo que viene por post y algun valor de productName en la session cart */




        if(in_array($product_name,$check_product)){

            /* si es asi,me traes un script que indique que el items es igual  */
    
    echo "
    
    <script>
alert('item igual')
window.location.href = 'index.php'
    </script>
    
    
    
    
    
    ";

        }else{ 

/* si no coinciden con ningun valor en la session cart me lo agregue al array los variables que vienen por post */

 $_SESSION['cart'][] =  array('productName' =>
 $product_name, 'productPrice' => $product_price,
 'productQuantity' => $product_quantity,'productImage' => $product_image,
 'total_product'=> $product_price * $_SESSION['contador']
);
 header('location:../../views/user/cart.php');
};










    }else{
        /* si no existe session cart me creas un array y me agregas los productos */
        $_SESSION['cart'][] =  array('productName' =>
        $product_name, 'productPrice' => $product_price,
        'productQuantity' => $product_quantity,'productImage' => $product_image,
        'total_product'=> $product_price * $_SESSION['contador']
    );
    header('location:../../views/user/cart.php');
    
    } 
    



}

/* Script Agregar Productos */


/* Script para remover productos  */

if(isset($_POST['remove'])){
    /* si viene por el post remove que viene por name */
    foreach($_SESSION['cart'] as $key => $value){
         /* haces un foreach de session cart y haces una condicional que si el valor de session cart
         productName coinciden lo que viene por post item (valor que esta en el form con hidden para extraer el nombre
         del producto) */
        if($value['productName'] === $_POST['item'] ){
            /* si existe borras exactamente ese valor */
            unset($_SESSION['cart'][$key]);
            /* despues volves a iterar los productos que no fueron borrados devuelta al session cart */
            $_SESSION['cart'] = array_values(
                $_SESSION['cart']
            );
            /* lo redirigis devuelta al cart.php */
            header('location:../../views/user/cart.php');
            
        }
    }
}

/* Script para remover productos  */


/* Script para sumar la cantidad del producto */


if(isset($_POST['mas'])){
/* si viene por el post mas  */

/* si existe el post numero lo agregas al contador para guardar el valor de la cantidad */
    if (isset($_POST["numero"])) {
        $_SESSION['contador'] =(int)$_POST["numero"];
    }
    
    foreach($_SESSION['cart'] as $key => $value){
        if($value['productName'] === $_POST['item'] ){
        
/* haces foreach en la session cart y si existe el valor product name con el post item,
 llamas a la base de datos viendo  si existe el producto que viene por post 
 y si el stock es igual o mayor que la cantidad */

            include '../../config/Config.php';

$resultado = mysqli_query($Con, "SELECT * FROM `producto` WHERE name = '$product_name' AND stock <=  $_SESSION[contador]");
/* el resultado se guarda en un variable */
$productoBD = mysqli_fetch_assoc($resultado);
/* si existe el producto que cumple la condicion del stock es igual o mayor queda igual la sesion contador
(se hace esto para que no agregue mas cantidad que se tiene del stock) */
if($productoBD){



          
            $_SESSION['cart'][$key]=array('productName' =>
            $product_name, 'productPrice' => $product_price,
            'productQuantity' =>  $_SESSION['contador'] ,'productImage' => $product_image,
            'total_product'=> $product_price * $_SESSION['contador']
           );
           header('location:../../views/user/cart.php');
            exit;
        }else{
            /* aqui si no cumple se puede mas uno a la session contador */
            $_SESSION['contador']++;
            $_SESSION['cart'][$key]=array('productName' =>
            $product_name, 'productPrice' => $product_price,
            'productQuantity' =>  $_SESSION['contador'] ,'productImage' => $product_image,
            'total_product'=> $product_price * $_SESSION['contador']
           );
           header('location:../../views/user/cart.php');
            exit;

        }
            
        }
    }
}

/* Script para sumar la cantidad del producto */




/* Script Restar cantidad productos */

if(isset($_POST['menos'])){
/* si existe lo que viene por post menos */
/* si existe el post numero lo agregas al contador para guardar el valor de la cantidad */
    if (isset($_POST["numero"])) {
        $_SESSION['contador'] =(int)$_POST["numero"];
    }
    
    foreach($_SESSION['cart'] as $key => $value){
        if($value['productName'] === $_POST['item'] ){
            /* si coinciden el valor product name con el post item */

            /* si la session contador es igual a 1 se queda igual la session contador (se hace esto 
            para que no reste mas de uno) */
        if($_SESSION['contador'] == 1){
           
            $_SESSION['cart'][$key]=array('productName' =>
            $product_name, 'productPrice' => $product_price,
            'productQuantity' =>  $_SESSION['contador'] ,'productImage' => $product_image,
            'total_product'=> $product_price * $_SESSION['contador']
           );
           header('location:../../views/user/cart.php');
            exit;
        }else{
            $_SESSION['contador']--;
            $_SESSION['cart'][$key]=array('productName' =>
            $product_name, 'productPrice' => $product_price,
            'productQuantity' =>  $_SESSION['contador'] ,'productImage' => $product_image,
            'total_product'=> $product_price * $_SESSION['contador']
           );
           header('location:../../views/user/cart.php');
            exit;

        }
            
        }
    }
}









}else{
    header('location:../../views/user/login.php');
}













?>