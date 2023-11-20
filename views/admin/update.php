<?php include '../../includes/header.php'?>


<?php

$id=$_GET['ID'];




include '../../config/Config.php';

$Record=mysqli_query($Con,"SELECT * FROM `producto` 
WHERE id =  '$id ");

$data=mysqli_fetch_array($Record);





?>


<?php

/* aqui se muestra los mensajes de la session errors si existe */
if(isset($_SESSION['errors-update']) && count( $_SESSION['errors-update'])!== 0){
foreach($_SESSION['errors-update'] as $message){
    echo '<li>' .  $message .   '<li>';
}
}







?>





<section class="flex justify-center ">
    <div  class="bg-[#FFFFFF] bg-opacity-30 shadow-custom m-3 p-4 w-[500px]" >
    <h2 class="text-4xl text-center font-extrabold">Actualizar Producto</h2>
    <img id="image-preview" src="<?php echo $data['image']?>" alt="Imagen previa">

    <form action="../../backend/admin/update2.php" method='POST' enctype='multipart/form-data'>
<h2>Nombre del producto</h2>
<input name='namexd' type="text" value='<?php echo $data['name']?>' id="campo-texto" class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
<h2>precio del producto</h2>
 <input type="text"  name='price' id="campo-password" value='<?php echo $data['price']?>'  class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
 <h2>stock</h2>
 <input type="number" name='stock' value='<?php echo $data['stock']?>'   class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
 <h2>Imagen del producto</h2>
 <input type="file" name='imagexd'  id="image-input"   class="border-2 shadow-custom border-black bg-transparent p-2 w-full">

 <h2>Selecciona la categoria</h2>
 <select class="border-2 shadow-custom border-black bg-transparent p-2 w-full" name='Pages' id="miSelect" >
  <option class="border-2 shadow-custom border-black bg-transparent p-2 w-full" value='Helado'>Helado</option>
  <option class="border-2 shadow-custom border-black bg-transparent p-2 w-full" value='Palito'>Palito</option>
  <option class="border-2 shadow-custom border-black bg-transparent p-2 w-full" value='Postres'>Postres</option>
  <!-- Agrega más opciones si es necesario -->
</select>
<div class="flex justify-end space-x-2 mt-4">
<input type='hidden' name='id' value='<?php echo $data['id']?>'>
<button name='update' class="bg-[#E97C8D] px-4 py-2 border border-2 border-black rounded-[40.5px] text-center ">Agregar</button>
</div>

</form>


</div>

</section>

<script>
    var select = document.getElementById("miSelect");

// Establece el valor seleccionado al valor deseado
select.value = '<?php echo $data['categoria']?>';
</script>
 

<?php include '../../includes/footer.php'?>