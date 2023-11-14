<?php


session_start();

if(isset($_SESSION['userxd'])){

$product_name=$_POST['name'];
$product_price=$_POST['price'];
$product_image=$_POST['image'];
$_SESSION['contador'] = 1;

$product_quantity=1;


if(isset($_POST['addCart'])){


    if(isset($_SESSION['cart'])){
        $check_product=array_column($_SESSION['cart'],'productName');
        if(in_array($product_name,$check_product)){

            
    
    echo "
    
    <script>
alert('item igual')
window.location.href = 'index.php'
    </script>
    
    
    
    
    
    ";

        }else{ 



 $_SESSION['cart'][] =  array('productName' =>
 $product_name, 'productPrice' => $product_price,
 'productQuantity' => $product_quantity,'productImage' => $product_image,
 'total_product'=> $product_price * $_SESSION['contador']
);
 header('location:cart.php');
};








    }else{
        $_SESSION['cart'][] =  array('productName' =>
        $product_name, 'productPrice' => $product_price,
        'productQuantity' => $product_quantity,'productImage' => $product_image,
        'total_product'=> $product_price * $_SESSION['contador']
    );
    header('location:cart.php');
    
    } 
    



}



if(isset($_POST['remove'])){
    foreach($_SESSION['cart'] as $key => $value){
        if($value['productName'] === $_POST['item'] ){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values(
                $_SESSION['cart']
            );
            header('location:cart.php');
            
        }
    }
}


if(isset($_POST['mas'])){

    if (isset($_POST["numero"])) {
        $_SESSION['contador'] =(int)$_POST["numero"];
    }
    
    foreach($_SESSION['cart'] as $key => $value){
        if($value['productName'] === $_POST['item'] ){
        


            $Con=mysqli_connect('localhost',
            'root','','ecommerce-helados-php');

$resultado = mysqli_query($Con, "SELECT * FROM `producto` WHERE name = '$product_name' AND stock <=  $_SESSION[contador]");
$productoBD = mysqli_fetch_assoc($resultado);

if($productoBD){



          
            $_SESSION['cart'][$key]=array('productName' =>
            $product_name, 'productPrice' => $product_price,
            'productQuantity' =>  $_SESSION['contador'] ,'productImage' => $product_image,
            'total_product'=> $product_price * $_SESSION['contador']
           );
            header('location:cart.php');
            exit;
        }else{
            $_SESSION['contador']++;
            $_SESSION['cart'][$key]=array('productName' =>
            $product_name, 'productPrice' => $product_price,
            'productQuantity' =>  $_SESSION['contador'] ,'productImage' => $product_image,
            'total_product'=> $product_price * $_SESSION['contador']
           );
            header('location:cart.php');
            exit;

        }
            
        }
    }
}

if(isset($_POST['menos'])){

    if (isset($_POST["numero"])) {
        $_SESSION['contador'] =(int)$_POST["numero"];
    }
    
    foreach($_SESSION['cart'] as $key => $value){
        if($value['productName'] === $_POST['item'] ){
        if($_SESSION['contador'] == 1){
           
            $_SESSION['cart'][$key]=array('productName' =>
            $product_name, 'productPrice' => $product_price,
            'productQuantity' =>  $_SESSION['contador'] ,'productImage' => $product_image,
            'total_product'=> $product_price * $_SESSION['contador']
           );
            header('location:cart.php');
            exit;
        }else{
            $_SESSION['contador']--;
            $_SESSION['cart'][$key]=array('productName' =>
            $product_name, 'productPrice' => $product_price,
            'productQuantity' =>  $_SESSION['contador'] ,'productImage' => $product_image,
            'total_product'=> $product_price * $_SESSION['contador']
           );
            header('location:cart.php');
            exit;

        }
            
        }
    }
}

/* 
if(isset($_POST['menos'])){
    foreach($_SESSION['cart'] as $key => $value){
        if($value['productName'] === $_POST['item'] ){
            $contar=1;

            $_SESSION['cart'][$key]=array('productName' =>
            $product_name, 'productPrice' => $product_price,
            'productQuantity' => $suma  - 1  ,'productImage' => $product_image
           );
            header('location:cart.php');


            
        }
    }
} */







}else{
    header('location:login.php');
}













?>