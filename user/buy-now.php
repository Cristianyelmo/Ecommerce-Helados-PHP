<?php
session_start();


$Con=mysqli_connect('localhost',
'root','','ecommerce-helados-php');
if(isset($_POST['buy'])){


    if(isset($_SESSION['cart'])){
 
        foreach($_SESSION['cart'] as  $key =>  $value){
            $hoy = getdate();
            $fecha = "" . $hoy['mday'] . "/ " . $hoy['mon'] . " /" . $hoy['year'] . "";
            mysqli_query($Con,"INSERT INTO `cart` (`name_user`,`product_name`,`product_image`
            ,`product_quantity`,`product_price`,`total_producto_price`,`date`)
             VALUES ('hola','$value[productName]','$value[productImage]',
             'pepe','$value[productPrice]','manolo','$fecha')");
            
           

        }
    }








}




?>