<?php
session_start();

$user=$_SESSION['userxd'];



$Con=mysqli_connect('localhost',
'root','','ecommerce-helados-php');
if(isset($_POST['buy'])){


    if(isset($_SESSION['cart'])){
 
        foreach($_SESSION['cart'] as  $key =>  $value){
            $hoy = getdate();
            $fecha = "" . $hoy['mday'] . "/ " . $hoy['mon'] . " /" . $hoy['year'] . "";
            mysqli_query($Con,"INSERT INTO `cart` (`name_user`,`product_name`,`product_image`
            ,`product_quantity`,`product_price`,`total_producto_price`,`date`)
             VALUES ('$user','$value[productName]','$value[productImage]',
             '$value[productQuantity]','$value[productPrice]','$value[total_product]','$fecha')");
            
            $query_update_stock = "UPDATE `producto` SET stock = stock - $value[productQuantity] WHERE name = '$value[productName]'";
            mysqli_query($Con, $query_update_stock);

        }


        unset($_SESSION['cart']);
    }


header('location:cart.php');









}




?>