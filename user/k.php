<?php

session_start();
$_SESSION['contadorxd'] = 1;

if (isset($_POST["numero"])) {
    $_SESSION['contadorxd'] =(int)$_POST["numero"];
}
 
if (isset($_POST['sumar']))
{
	$_SESSION['contadorxd']++;
} elseif (isset($_POST['restar'])) {
	$_SESSION['contadorxd']--;
}

header('location:ejemplo.php')



?>