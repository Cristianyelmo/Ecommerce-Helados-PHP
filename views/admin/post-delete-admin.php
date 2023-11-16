<?php include '../../includes/header.php'?>

<section class="flex justify-center ">
    <div  class="bg-[#FFFFFF] bg-opacity-30 shadow-custom m-3 p-4 w-[500px]" >
    <h2 class="text-4xl text-center font-extrabold">Agregar Producto</h2>
    <img id="image-preview" src="img/posicion-normal.png" alt="Imagen previa">

    <form action="../../backend/admin/insert.php" method='POST' enctype='multipart/form-data'>
<h2>Nombre del producto</h2>
<input name='namexd' type="text" id="campo-texto" class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
<h2>precio del producto</h2>
 <input type="text"  name='price' id="campo-password"  class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
 <h2>stock</h2>
 <input type="number" name='stock'    class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
 <h2>Imagen del producto</h2>
 <input type="file" name='imagexd'  id="image-input"   class="border-2 shadow-custom border-black bg-transparent p-2 w-full">

 <h2>Selecciona la categoria</h2>
 <select class="border-2 shadow-custom border-black bg-transparent p-2 w-full" name='Pages'>
  <option class="border-2 shadow-custom border-black bg-transparent p-2 w-full" value='Helado'>Helado</option>
  <option class="border-2 shadow-custom border-black bg-transparent p-2 w-full" value='Palito'>Palito</option>
  <option class="border-2 shadow-custom border-black bg-transparent p-2 w-full" value='Postres'>Postres</option>
  <!-- Agrega más opciones si es necesario -->
</select>
<div class="flex justify-end space-x-2 mt-4">

<button name='submit' class="bg-[#E97C8D] px-4 py-2 border border-2 border-black rounded-[40.5px] text-center ">Agregar</button>
</div>

</form>


</div>

</section>




<section class="flex justify-center space-x-3 mt-[30px]">


<table class="border-collapse ">
        <tr>
        <th scope="col" class="border p-2 text-center">Id</th>
      <th scope="col" class="border p-2 text-center">Name</th>
      <th scope="col" class="border p-2 text-center">Price</th>
      <th scope="col" class="border p-2 text-center">Stock</th>
      <th scope="col" class="border p-2 text-center">Image</th>
      <th scope="col" class="border p-2 text-center">Category</th>
      <th scope="col" class="border p-2 text-center">Delete</th>
      <th scope="col" class="border p-2 text-center">Update</th>
        </tr>


        <tr class='flex flex-col' >
<?php

include '../../config/Config.php';

$record= mysqli_query($Con,"SELECT * FROM `producto`");


$rows2 = array();
while ($rowsxd = mysqli_fetch_array($record)) {
    $rows2[] = $rowsxd;
}




foreach ($rows2 as $row) {
  

      
        echo "
            <tr>
                <td class='border p-2 text-center'>$row[id]</td>
                <td class='border p-2 text-center'>$row[name]</td>
                <td class='border p-2 text-center'>$row[price]</td>
                <td class='border p-2 text-center'> $row[stock]</td>
                <td class='border p-2 text-center'><img src='$row[image]' class='w-[60px]' alt=''></td>
                <td class='border p-2 text-center'>$row[categoria]</td>
                <td class='border p-2 text-center'><a href='../../backend/admin/delete.php?ID=$row[id]'>Delete</a></td>
                <td class='border p-2 text-center'><a href='../../views/admin/update.php?ID=$row[id]'>Update</a></td>
            </tr>";
    
}













 

 
        ?>

</tr>

    </table>














</section>



<?php include '../../includes/footer.php'?>
