
<!DOCTYPE html>
<html>
<head>
	<title>Page Title</title>
	<meta charset="utf-8">
 
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
 
</head>
<body>
 
<p>El numero actual es el <?php
session_start();
if(isset($_SESSION['contadorxd'])){

 
 echo $_SESSION['contadorxd'];
}else{
    echo "0";
}
 ?></p>
 
<form name = "submit" action = "k.php" method = "POST">
    <input type="hidden" name="numero" value="<?php echo $_SESSION['contadorxd']?>">
Sumar <input type = "submit" name = "sumar" value = "sumar"><br>
Restar <input type = "submit" name = "restar" value = "restar">
</form>
 
</body>
 
</html>