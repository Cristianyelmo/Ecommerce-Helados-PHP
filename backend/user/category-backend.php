<?php
session_start();

if (isset($_POST['price'])) {
    /* si existe en el post price me guarda en un variable y verificas que el valor sea numerico */
    $precio = floatval($_POST['price']);

    /* lo guardas en una seesion filtro_precio y lo redirigis a category.php */
    $_SESSION['filtro_precio'] = $precio;

 
    header('Location:../../views/user/category.php');
    exit();  
}
?>