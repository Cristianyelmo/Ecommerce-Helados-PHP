<?php

$Con=mysqli_connect('localhost',
'root','','ecommerce-helados-php');



if(isset($_POST['submit'])){

$Name = $_POST['name'];
$Email=$_POST['email'];
$Password=$_POST['password'];


$Email_review = mysqli_query($Con,
"SELECT * FROM  `user` WHERE email = '$Email'");


$Name_review = mysqli_query($Con,
"SELECT * FROM  `user` WHERE username = '$Name'");



if(mysqli_num_rows($Email_review)){

    echo "<script>
    alert('This Email is already taken')
    window.location.href='register.php'
    
    </script>";





}else if (mysqli_num_rows($Name_review)){

    echo "<script>
    alert('This Email is already taken')
    window.location.href='register.php'
    
    </script>";





}else{
    
mysqli_query($Con,"INSERT INTO `user` (`username`,`email`,`password`
,`type`) VALUES ('$Name','$Email','$Password','user')");

session_start();



    $_SESSION['userxd'] = $Name;





header('location:index.php');


}









}







?>