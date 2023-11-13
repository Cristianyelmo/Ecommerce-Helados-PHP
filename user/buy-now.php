<?php
session_start();

$user=$_SESSION['userxd'];



$Con=mysqli_connect('localhost',
'root','','ecommerce-helados-php');
if(isset($_POST['buy'])){


    if(isset($_SESSION['cart'])){
 
        foreach($_SESSION['cart'] as  $key =>  $value){

          
$record= mysqli_query($Con,"SELECT * FROM `producto`");


$rows2 = array();
while ($rowsxd = mysqli_fetch_array($record)) {
    $rows2[] = $rowsxd;
}

$resultado = mysqli_query($Con, "SELECT * FROM `producto` WHERE name = '$value[productName]' AND stock -  $value[productQuantity] < 0");
$productoBD = mysqli_fetch_assoc($resultado);
if($productoBD){
    echo "<script>
    if($productoBD[stock] === 0){
        alert('no hay stock')
        window.location.href='cart.php'

    }else{
        alert('el producto $value[productName] solo quedan $productoBD[stock]  ')
        window.location.href='cart.php'
    }
   
    
    </script>";
   

}else{

           



            $hoy = getdate();
            $fecha = "" . $hoy['mday'] . "/ " . $hoy['mon'] . " /" . $hoy['year'] . "";
            mysqli_query($Con,"INSERT INTO `cart` (`name_user`,`product_name`,`product_image`
            ,`product_quantity`,`product_price`,`total_producto_price`,`date`)
             VALUES ('$user','$value[productName]','$value[productImage]',
             '$value[productQuantity]','$value[productPrice]','$value[total_product]','$fecha')");
            
            $query_update_stock = "UPDATE `producto` SET stock = stock - $value[productQuantity] WHERE name = '$value[productName]'";
            mysqli_query($Con, $query_update_stock);
            foreach($_SESSION['cart'] as $key => $value){
                
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values(
                        $_SESSION['cart']
                    );
                  
                    
                
            }
            header('location:cart.php');

        }
        

        }


        
    }

/*  header('location:cart.php');  */









}




?>