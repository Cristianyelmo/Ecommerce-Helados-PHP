<?php include '../../includes/header.php'?>

<section class=" ">
    <h2 class="text-4xl text-center font-extrabold"><?php  echo $_SESSION['filtro_categoria']?></h2>
<div class="flex justify-center space-x-3 mt-4">
   

<form action="../../backend/user/category-backend.php" method="POST">
    <h2 class='text-center mb-[5px]'> Precio hasta:</h2>
<input type="number" name='price' class="border-2 shadow-custom border-black bg-transparent p-2 w-full" value='<?php if(isset($_SESSION['filtro_precio'])){
    echo $_SESSION['filtro_precio'] ;
}else{
echo '';
} ?>'>

<div class='flex justify-center mt-[10px]'>

<button type='submit' class='bg-[#E97C8D] p-4 border border-3 border-black rounded-[40.5px] text-center'>buscar</button>
</div>
</form>



</div>

<!-- flex-wrap productos -->
<div class="flex flex-col justify-center " >
<div class="flex flex-wrap justify-center ">
<?php
/* get categoriaxd trae la informacion de que categoria fue seleccionada ,si existe me lo guarda en la session filtro_categoria
,si no existe solo mostras categoria,esto lo hice para que si recarga la pagina se guarde el valor de la categoria
cuando se filtre el precio, pero si se llama a get se actualize el valor */

    
    $_SESSION['filtro_categoria'];


$_SESSION['selected_page']=1;



include '../../config/Config.php';
/* se crea una variable para saber la cantidad de productos que se quiere tener en cada paginacion */
$elementosPorPagina = 2;

/* la pagina actual se queda en 1 si no existe el lo que viene por get   */
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

/* se crea una variable para calcular  */
$inicio = ($paginaActual - 1) * $elementosPorPagina;

/* la variable consulta lo que hace es traer todos los productos y el where 1=1 se usa para que se agregar 
dinamicamente mas condiciones,si no agrega mas condiciones el where queda como si no estuviera */
$consulta = "SELECT * FROM `producto` WHERE 1=1";

if (isset($_SESSION['filtro_categoria']) && !empty($_SESSION['filtro_categoria'])) {
    $categoria = mysqli_real_escape_string($Con, $_SESSION['filtro_categoria']);
    /* se hace que si existe filtro_categoria se agregue la categoria correspondiente
    y se agrega a esta variable seria como ej:"SELECT * FROM `producto` WHERE 1=1 + AND categoria = $categoria"  */
    $consulta .= " AND categoria = '$categoria'";
   
}

if (isset($_SESSION['filtro_precio']) && !empty($_SESSION['filtro_precio'])) {
    $precio = mysqli_real_escape_string($Con, $_SESSION['filtro_precio']);
    /* se hace que si existe filtro_precio se agregue la categoria correspondiente
    y se agrega a esta variable seria como ej:"SELECT * FROM `producto` WHERE 1=1 + AND price = $precio"  */
    $consulta .= " AND price <= $precio";
   
} 
/* usando la variable inicio y elementos por pagina creas la paginacion correspondiente */
$consulta .= " LIMIT $inicio, $elementosPorPagina";


/* una vez pasado por si agrego nueva consulta o no, se llama a la base de datos */
$resultado = mysqli_query($Con, $consulta);

 


/* se hace un while iterando y pintando */
while ($fila=mysqli_fetch_array($resultado)) {
    // Mostrar los elementos en tu página
    echo "
    
   
    <form action='../../backend/user/insertCart.php' method='POST'>
    
    <div class='item pr-4 relative w-[500px] ' >



<div class=' absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex flex-col ' >
 <div class='w-[150px] ml-[55px]'>
 <img src='../../backend/admin/$fila[image] ' class='w-[100px] h-[130px]'  >
 </div>
<!-- <img src='../../public/img/helado-limon.png ' class='w-[90px]' > -->
<h2 class='text-center font-extrabold'>$fila[name]</h2>
<h2 class='text-center font-extrabold'>$fila[price]</h2>

<div class='text-center'>
<input type='hidden' name='name' value='$fila[name]'>
<input type='hidden' name='price' value='$fila[price]'>
<input type='hidden' name='image' value='$fila[image]'>

<button type='submit' name='addCart' class='bg-[#E97C8D] p-4 border border-3 border-black rounded-[40.5px] text-center'>Add Cartxd</button>
</div>

</div>
 

 <img src='../../public/img/nubes2.png' class='' >

   </div>
 
   </form>
   ";
}

/* se crea una variable para por obtener el numero de cuanto productos hay */
$totalElementosQuery = "SELECT COUNT(*) as total FROM `producto` WHERE 1=1";
if (isset($_SESSION['filtro_categoria']) && !empty($_SESSION['filtro_categoria'])) {
    $categoria = mysqli_real_escape_string($Con, $_SESSION['filtro_categoria']);
    /* se hace que si existe filtro_precio se agregue la categoria correspondiente
    y se agrega a esta variable seria como ej:"SELECT * FROM `producto` WHERE 1=1 + AND price = $precio"  */
    $totalElementosQuery .= " AND categoria = '$categoria'";
   
}

if (isset($_SESSION['filtro_precio']) && !empty($_SESSION['filtro_precio'])) {
    $precio = mysqli_real_escape_string($Con, $_SESSION['filtro_precio']);
    /* se hace que si existe filtro_precio se agregue la categoria correspondiente
    y se agrega a esta variable seria como ej:"SELECT * FROM `producto` WHERE 1=1 + AND price = $precio"  */
    $totalElementosQuery .= " AND price <= $precio";
   
} 
/* se crea devuelta un llamado a la base de datos */
$resultadoTotalElementos = mysqli_query($Con, $totalElementosQuery);
/* aqui se obtiene la cantidad exacta  */
$totalElementos = mysqli_fetch_assoc($resultadoTotalElementos)['total'];




?>

</div>


<div class='flex justify-center space-x-3'>
<?php

/* se itera mostrando los items para paginar  */
if(isset($_SESSION['filtro_precio'])){
    for ($i = 1; $i <= ceil($totalElementos / $elementosPorPagina); $i++) {
    echo "<a class='bg-[#ffc0cb] p-[10px] " . ($_SESSION['selected_page'] == $i ? 'selected' : '') . "' href='?pagina=$i&categoria=$_SESSION[filtro_categoria]&precio=$_SESSION[filtro_precio]'>$i</a> ";
}
    
    }else{
        for ($i = 1; $i <= ceil($totalElementos / $elementosPorPagina); $i++) {
            echo "<a class='bg-[#ffc0cb] p-[10px] " . ($_SESSION['selected_page'] == $i ? 'selected' : '') . "' href='?pagina=$i&categoria=$_SESSION[filtro_categoria]'>$i</a> ";
        }
    }
?>
</div>





    <!-- producto -->
  
 <!--  -->
   
   
 
</div>








   
 
</div>














</div>
















</section>
<?php include '../../includes/footer.php'?>