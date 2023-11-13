<?php include '../header.php'?>

<section class=" ">
    <h2 class="text-4xl text-center font-extrabold">POSTRES</h2>
<div class="flex justify-center space-x-3 mt-4">
    <div class="flex">
    <h3>Price</h3>
    <span class="material-symbols-outlined">
expand_more
</span>
    </div>

<form action="category-backend.php" method="POST">
    
<input type="number" name='price' value='<?php echo $_SESSION['filtro_precio'] ?>'>


<button type='submit'>buscar</button>
</form>


<div class="flex">
    <h3>Sort</h3>
    <span class="material-symbols-outlined">
expand_more
</span>
    </div>
</div>

<!-- flex-wrap productos -->
<div class="flex flex-wrap justify-center " >

<?php

if(isset($_GET['categoriaxd'])){
    $_SESSION['filtro_categoria']=$_GET['categoriaxd'];
   
}else{
    
    $_SESSION['filtro_categoria'];
}




/* $categoria_price=$_POST['price']; */
$Con=mysqli_connect('localhost',
'root','','ecommerce-helados-php');
$elementosPorPagina = 2;

// Página actual (por defecto es 1 si no se especifica)
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular el índice de inicio para la consulta SQL
$inicio = ($paginaActual - 1) * $elementosPorPagina;


$consulta = "SELECT * FROM `producto` WHERE 1=1";

if (isset($_SESSION['filtro_categoria']) && !empty($_SESSION['filtro_categoria'])) {
    $categoria = mysqli_real_escape_string($Con, $_SESSION['filtro_categoria']);
    $consulta .= " AND categoria = '$categoria'";
   
}

if (isset($_SESSION['filtro_precio']) && !empty($_SESSION['filtro_precio'])) {
    $precio = mysqli_real_escape_string($Con, $_SESSION['filtro_precio']);
    $consulta .= " AND price <= $precio";
   
} 
$consulta .= " LIMIT $inicio, $elementosPorPagina";



$resultado = mysqli_query($Con, $consulta);

 


// Mostrar los elementos
while ($fila=mysqli_fetch_array($resultado)) {
    // Mostrar los elementos en tu página
    echo "<div class='item pr-4 relative w-[500px] ' style='
    z-index: -1;
' >



<div class=' absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex flex-col ' >
 <div class='w-[40px] ml-16'>
 <img src='img/helado-limon.png '  >
 </div>
<!-- <img src='img/helado-limon.png ' class='w-[90px]' > -->
<h2 class='text-center font-extrabold'>$fila[name]</h2>
<h2 class='text-center font-extrabold'>$fila[price]</h2>
<div class='text-center'>
<button class='bg-[#E97C8D] p-4 border border-3 border-black rounded-[40.5px] text-center'>Add Cart</button>
</div>
</div>
 

 <img src='img/nubes2.png' class='' >

   </div>";
}

$totalElementosQuery = "SELECT COUNT(*) as total FROM `producto` WHERE 1=1";
if (isset($_SESSION['filtro_categoria']) && !empty($_SESSION['filtro_categoria'])) {
    $categoria = mysqli_real_escape_string($Con, $_SESSION['filtro_categoria']);
    $totalElementosQuery .= " AND categoria = '$categoria'";
   
}

if (isset($_SESSION['filtro_precio']) && !empty($_SESSION['filtro_precio'])) {
    $precio = mysqli_real_escape_string($Con, $_SESSION['filtro_precio']);
    $totalElementosQuery .= " AND price <= $precio";
   
} 

$resultadoTotalElementos = mysqli_query($Con, $totalElementosQuery);
$totalElementos = mysqli_fetch_assoc($resultadoTotalElementos)['total'];

// Mostrar enlaces de paginación
for ($i = 1; $i <= ceil($totalElementos / $elementosPorPagina); $i++) {
    echo "<a href='?pagina=$i&categoria=$_SESSION[filtro_categoria]&precio=$_SESSION[filtro_precio]'>$i</a> ";
}



?>












    <!-- producto -->
  
 <!--  -->
   
   
 
</div>








   
 
</div>














</div>
















</section>

<?php include '../footer.php'?> 