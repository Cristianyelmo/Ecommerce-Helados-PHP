<?php

$Con=mysqli_connect('localhost',
'root','','ecommerce-helados-php');

session_start();

if(isset($_POST['submit'])){

$Name = $_POST['name'];
$Email=$_POST['email'];
$Password=$_POST['password'];
$Repassword=$_POST['repassword'];

$_SESSION['errors']=[];

$parametros=[$Name,$Email,$Password,$Repassword];

foreach($parametros as $parametro){
if(strlen(trim($parametro))<1){
    $_SESSION['errors'][]='Debe llenar los campos';
     header('location:register.php');
}

}





    if(filter_var($Email,FILTER_VALIDATE_EMAIL)){
       
    }else{
        $_SESSION['errors'][]='Debe ser un email';
        header('location:register.php');
    }




    if(strcmp($Password,$Repassword)=== 0){
       
    }else{
        $_SESSION['errors'][]='Debe coincidir la contraseña';
        header('location:register.php');
    }














$Email_review = mysqli_query($Con,
"SELECT * FROM  `user` WHERE email = '$Email'");


$Name_review = mysqli_query($Con,
"SELECT * FROM  `user` WHERE username = '$Name'");


if(mysqli_num_rows($Email_review)){

    $_SESSION['errors'][]='el email ya existe';

    header('location:register.php');



}



 if (mysqli_num_rows($Name_review)){

    $_SESSION['errors'][]='el usuario ya existe';
    header('location:register.php');




}


if(count( $_SESSION['errors']) == 0){
    
mysqli_query($Con,"INSERT INTO `user` (`username`,`email`,`password`
,`type`) VALUES ('$Name','$Email','$Password','user')");

session_start();

unset($_SESSION['errors']);

    $_SESSION['userxd'] = $Name;





header('location:index.php');


}









}







?>