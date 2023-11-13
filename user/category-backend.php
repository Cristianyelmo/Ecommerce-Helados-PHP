<?php
session_start();

if (isset($_POST['price'])) {
    // Asegúrate de que el valor de price sea numérico
    $precio = floatval($_POST['price']);

    // Almacenar el precio en la sesión
    $_SESSION['filtro_precio'] = $precio;

    // Redireccionar a category.php
    header('Location: category.php');
    exit();  // Asegura que el script se detenga después de la redirección
}
?>