<?php
   // Tu consulta para obtener datos de la tabla 'cart'
$record_cart = mysqli_query($con, "SELECT * FROM `cart`");

// Obtén todas las filas de la tabla principal
$record = mysqli_query($con, "SELECT * FROM `tu_tabla_principal`");
$rows = mysqli_fetch_all($record, MYSQLI_ASSOC);

// Verifica si el conjunto de resultados de 'cart' está vacío
if (mysqli_num_rows($record_cart) > 0) {
    // Itera sobre las filas de 'cart'
    while ($row_cart = mysqli_fetch_array($record_cart)) {
        $encontrado = false;

        // Itera sobre las filas de la tabla principal
        foreach ($rows as $row) {
            if ($row['name'] === $row_cart['product_name']) {
                // Si hay coincidencia, calcula el nuevo stock y muestra los resultados
                $stock_result = $row['stock'] - $row_cart['product_quantity'];
                echo "
                    <tr>
                        <td class='border p-2 text-center'>$row[id]</td>
                        <td class='border p-2 text-center'>$row[name]</td>
                        <td class='border p-2 text-center'>$row[price]</td>
                        <td class='border p-2 text-center'>$stock_result</td>
                        <td class='border p-2 text-center'><img src='$row[image]' class='w-[60px]' alt=''></td>
                        <td class='border p-2 text-center'>$row[categoria]</td>
                        <td class='border p-2 text-center'><a href='delete.php?ID=$row[id]'>Delete</a></td>
                        <td class='border p-2 text-center'><a href='update.php?ID=$row[id]'>Update</a></td>
                    </tr>";
                $encontrado = true;
                break;
            }
        }

        // Si no se encuentra una coincidencia, muestra la fila de 'cart'
        if (!$encontrado) {
            echo "
                <tr>
                    <td class='border p-2 text-center'></td>
                    <td class='border p-2 text-center'>$row_cart[product_name]</td>
                    <td class='border p-2 text-center'>$row_cart[product_quantity]</td>
                    <!-- Agrega más columnas según sea necesario -->
                </tr>";
        }
    }
} else {
    echo "El conjunto de resultados de 'cart' está vacío.";
}






















$rows = array();
while ($row = mysqli_fetch_array($record)) {
    $rows[] = $row;
}

$encontrado = false;
if(mysqli_num_rows($record_cart) == 0){
  foreach ($rows as $row) {
    /* while($row = mysqli_fetch_array($record)){ */
    
    
   
     
    echo
           "  <tr>
                <td class='border p-2 text-center'>$row[id]</td>
                <td class='border p-2 text-center'>$row[name]</td>
                <td class='border p-2 text-center'>$row[price]</td>
                <td class='border p-2 text-center'> $row[stock]</td>
                <td class='border p-2 text-center'><img src='$row[image]' class='w-[60px]' alt=''></td>
                <td class='border p-2 text-center'>$row[categoria]</td>
                <td class='border p-2 text-center'><a href='delete.php?ID=$row[id]'>Delete</a></td>
                <td class='border p-2 text-center'><a href='update.php?ID=$row[id]'>Update</a></td>
                </tr>
           ";
          }
}else{

while($row_cart = mysqli_fetch_array($record_cart)){
  
  foreach ($rows as $row) {



 if(($row['name']) === $row_cart['product_name']){ 
  $stock_result=$row['stock'] - $row_cart['product_quantity'];
echo
       "  <tr>
            <td class='border p-2 text-center'>$row[id]</td>
            <td class='border p-2 text-center'>$row[name]</td>
            <td class='border p-2 text-center'>$row[price]</td>
            <td class='border p-2 text-center'> $stock_result</td>
            <td class='border p-2 text-center'><img src='$row[image]' class='w-[60px]' alt=''></td>
            <td class='border p-2 text-center'>$row[categoria]</td>
            <td class='border p-2 text-center'><a href='delete.php?ID=$row[id]'>Delete</a></td>
            <td class='border p-2 text-center'><a href='update.php?ID=$row[id]'>Update</a></td>
            </tr>
       ";
   
  
      } 










      
     /*  } */
    }
    }



  }


if($encontrado){
  foreach ($rows as $row) {
    /* while($row = mysqli_fetch_array($record)){ */
    
    
   
     
    echo
           "  <tr>
                <td class='border p-2 text-center'>$row[id]</td>
                <td class='border p-2 text-center'>$row[name]</td>
                <td class='border p-2 text-center'>$row[price]</td>
                <td class='border p-2 text-center'> $row[stock]</td>
                <td class='border p-2 text-center'><img src='$row[image]' class='w-[60px]' alt=''></td>
                <td class='border p-2 text-center'>$row[categoria]</td>
                <td class='border p-2 text-center'><a href='delete.php?ID=$row[id]'>Delete</a></td>
                <td class='border p-2 text-center'><a href='update.php?ID=$row[id]'>Update</a></td>
                </tr>
           ";
          }


}











$suma_columna = 0;
$productos_procesados = array();

foreach ($rows2 as $row) {
    $nombre_producto = $row['name'];

    // Verifica si el producto ya se ha procesado
    if (!in_array($nombre_producto, $productos_procesados)) {
        // Realiza tus operaciones aquí para el producto (por ejemplo, suma)
        // ...

        // Marca el producto como procesado
        $productos_procesados[] = $nombre_producto;

        // Calcula el stock nuevo
        $stock_nuevo = $row['stock'] - $suma_columna;

        // Muestra la información del producto
        echo "
            <tr>
                <td class='border p-2 text-center'>$row[id]</td>
                <td class='border p-2 text-center'>$row[name]</td>
                <td class='border p-2 text-center'>$row[price]</td>
                <td class='border p-2 text-center'>$stock_nuevo</td>
                <td class='border p-2 text-center'><img src='$row[image]' class='w-[60px]' alt=''></td>
                <td class='border p-2 text-center'>$row[categoria]</td>
                <td class='border p-2 text-center'><a href='delete.php?ID=$row[id]'>Delete</a></td>
                <td class='border p-2 text-center'><a href='update.php?ID=$row[id]'>Update</a></td>
            </tr>";
    }
}







// ... Establecer la conexión a la base de datos ...

// Inicializar la suma total de product_quantity
$suma_total = 0;

// Iterar sobre los elementos de la tabla cart
foreach ($rows_cart as $row_cart) {
    $product_name = $row_cart['product_name'];
    $product_quantity = $row_cart['product_quantity'];

    // Sumar el product_quantity al total
    $suma_total += $product_quantity;
}

// Actualizar el stock en la tabla producto
$query_update_stock = "UPDATE producto SET stock = stock - $suma_total WHERE name = '$product_name'";
mysqli_query($con, $query_update_stock);

// ... Cerrar la conexión a la base de datos ...




<?php

// Supongamos que $productoArray es tu array con la información del producto
$productoArray = array(
    'id' => 123,
    'cantidad' => 5, // La cantidad que se restará al stock
    // ... otras propiedades del producto
);

// Conexión a la base de datos
$Con = mysqli_connect("tu_host", "tu_usuario", "tu_contraseña", "tu_base_de_datos");

// Verificar la conexión
if (mysqli_connect_errno()) {
    echo "Error al conectar a MySQL: " . mysqli_connect_error();
    exit();
}

// Obtener el producto de la base de datos
$idProducto = $productoArray['id'];
$resultado = mysqli_query($Con, "SELECT * FROM `producto` WHERE id = $idProducto");

// Verificar si se obtuvo el producto
if ($resultado) {
    $productoBD = mysqli_fetch_assoc($resultado);

    // Verificar si el producto existe en la base de datos
    if ($productoBD) {
        // Restar la cantidad al stock
        $nuevoStock = $productoBD['stock'] - $productoArray['cantidad'];

        // Actualizar el stock en la base de datos
        mysqli_query($Con, "UPDATE `producto` SET stock = $nuevoStock WHERE id = $idProducto");

        // Realizar una condicional basada en el resultado
        if ($nuevoStock >= 0) {
            echo "Operación exitosa. Nuevo stock: $nuevoStock";
        } else {
            echo "No hay suficiente stock disponible.";
        }
    } else {
        echo "El producto no existe en la base de datos.";
    }

    // Liberar el resultado
    mysqli_free_result($resultado);
} else {
    echo "Error en la consulta: " . mysqli_error($Con);
}

// Cerrar la conexión
mysqli_close($Con);

?>





    ?>















<!--  -->


