<?php

include '../../config/Config.php';

session_start();

if(isset($_POST['submit'])){
/* si existe el post submit  */
$Name = $_POST['name'];
$Email=$_POST['email'];
$Password=$_POST['password'];
$Repassword=$_POST['repassword'];
/* se guarda en un variable los post */
/* se crea una session de errors para ir agregando valores al array */
$_SESSION['errors']=[];
/* se guarda en un valor un array con los valores de post */
$parametros=[$Name,$Email,$Password,$Repassword];
/* se itera esos valores y si se hace una condicional para ver si no estan vacios,si los estan se agrega
a la session un error */

$llenar=false;
foreach($parametros as $parametro){
if(strlen(trim($parametro))<1){
   $llenar=true;
}
}

/* se crea una variable llenar en false, para asi si existe en el array parametros alguno vacio se cambie la variable llenar a true y
solo te muestre la informacion una vez  */
if($llenar == true){
    $_SESSION['errors'][]='Debe llenar todos los campos';
    header('location:../../views/user/register.php');
}



/* si el email que viene es efectivamente un email, no se hace nada en cambio si, no es un email 
se agrega un valor al array de session errors y se redirige  */
    if(filter_var($Email,FILTER_VALIDATE_EMAIL)){
       
    }else{
        $_SESSION['errors'][]='Debe ser un email';
        header('location:../../views/user/register.php');
    }


/* si el password no coinciden con el valor de Repassword se agrega un error a la session errors */

    if(strcmp($Password,$Repassword)=== 0){
       
    }else{
        $_SESSION['errors'][]='Debe coincidir la contraseña';
        header('location:../../views/user/register.php');
    }












/* verifica en la base de datos si existe el email o el username  */

$Email_review = mysqli_query($Con,
"SELECT * FROM  `user` WHERE email = '$Email'");


$Name_review = mysqli_query($Con,
"SELECT * FROM  `user` WHERE username = '$Name'");

/* si existe el email o username me lo agregas a la session de errors */
if(mysqli_num_rows($Email_review)){

    $_SESSION['errors'][]='el email ya existe';

    header('location:../../views/user/register.php');



}



 if (mysqli_num_rows($Name_review)){

    $_SESSION['errors'][]='el usuario ya existe';
    header('location:../../views/user/register.php');




}
/* si la session errors esta vacia se agrega a la base de datos toda la informacion y creas 
la session userxd y guarda el name que viene por post y la session errors la eliminas */

if(count( $_SESSION['errors']) == 0){
    
mysqli_query($Con,"INSERT INTO `user` (`username`,`email`,`password`
,`type`) VALUES ('$Name','$Email','$Password','user')");

session_start();



    $_SESSION['userxd'] = $Name;
    $newMessage = "Bienvenido $_SESSION[userxd]";
    $_SESSION['errors']=[$newMessage];




header('location:../../views/user/index.php');


}









}







?>