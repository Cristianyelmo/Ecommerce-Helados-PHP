
<?php
$Name = $_POST['name'];
$Password = $_POST['password'];



$Con=mysqli_connect('localhost',
'root','','ecommerce-helados-php');



$result = mysqli_query($Con,"SELECT * FROM `user` WHERE (username = '$Name' OR email = '$Name') AND password = '$Password ' AND type = 'user'");



$result_admin = mysqli_query($Con,"SELECT * FROM `user` WHERE (username = '$Name' OR email = '$Name') AND password = '$Password ' AND type = 'admin'");
/* seesion start */

session_start();

if(mysqli_num_rows($result)){

   
    $fila = mysqli_fetch_assoc($result);
    $_SESSION['userxd'] = $fila['username'];

    echo "
    <script>  
     alert('Sucessfull') 
     window.location.href='index.php'
    </script>  
      
      
      
      ";





}else if (mysqli_num_rows($result_admin)){
    $fila_admin = mysqli_fetch_assoc($result_admin);
    $_SESSION['adminxd'] = $fila_admin['username'];

    echo "
    <script>  
     alert('Sucessfull') 
     window.location.href='../admin/post-delete-admin.php'
    </script>  
      
      
      
      ";




}







else{


    echo "
    <script>  
     alert('incorrect email/password') 
      window.location.href='login.php'
    </script>  
      
      
      
      ";




}














?>