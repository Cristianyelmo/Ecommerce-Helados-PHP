
<?php


/* Trae la informacion del formulario por : name='name',name='password' */

$Name = $_POST['name'];
$Password = $_POST['password'];
/* llamas a la base de datos */
include '../../config/Config.php';


/* verificas que el usuario exista en la base de datos */
$result = mysqli_query($Con,"SELECT * FROM `user` WHERE (username = '$Name' OR email = '$Name') AND password = '$Password ' AND type = 'user'");

/* verificas que el admin exista en la base de datos */

$result_admin = mysqli_query($Con,"SELECT * FROM `user` WHERE (username = '$Name' OR email = '$Name') AND password = '$Password ' AND type = 'admin'");

/* inicias session para crear una session */
session_start();

if(mysqli_num_rows($result)){
/* si existe el usuario en la base de datos guardamelo en una session
el array con el valor username en la session userxd 
y redirigime al index.php*/
   
    $fila = mysqli_fetch_assoc($result);
    $_SESSION['userxd'] = $fila['username'];

    echo "
    <script>  
     alert('Sucessfull') 
     window.location.href='../../views/user/index.php'
    </script>  
      
      
      
      ";





}else if (mysqli_num_rows($result_admin)){

  /* si existe el admin en la base de datos guardamelo en una session
el array con el valor username en la session adminxd 
y redirigime al post-delete-admin.php*/
    $fila_admin = mysqli_fetch_assoc($result_admin);
    $_SESSION['adminxd'] = $fila_admin['username'];

    echo "
    <script>  
     alert('Sucessfull') 
     window.location.href='../../views/admin/post-delete-admin.php'
    </script>  
      
      
      
      ";




}







else{

/* si no existe ninguna de las 2,redirigime al login devuelta */
    echo "
    <script>  
     alert('incorrect email/password') 
      window.location.href='../../views/user/login.php'
    </script>  
      
      
      
      ";




}














?>