<?php include '../header.php'?>

<section class="flex justify-center ">
    <div  class="bg-[#FFFFFF] bg-opacity-30 shadow-custom m-3 p-4 w-[500px]" >
    <h2 class="text-4xl text-center font-extrabold">Agregar Producto</h2>
 
<h2>Nombre del producto</h2>
<input type="text" id="campo-texto" class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
<h2>precio del producto</h2>
 <input type="password" id="campo-password"  class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
 <h2>Imagen del producto</h2>
 <input type="file" id="campo-password"  class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
 <h2>Selecciona la categoria</h2>
 <select class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
  <option class="border-2 shadow-custom border-black bg-transparent p-2 w-full" value="opcion1">Opción 1</option>
  <option class="border-2 shadow-custom border-black bg-transparent p-2 w-full" value="opcion2">Opción 2</option>
  <option class="border-2 shadow-custom border-black bg-transparent p-2 w-full" value="opcion3">Opción 3</option>
  <!-- Agrega más opciones si es necesario -->
</select>
<div class="flex justify-end space-x-2 mt-4">

<button class="bg-[#E97C8D] px-4 py-2 border border-2 border-black rounded-[40.5px] text-center ">Agregar</button>
</div>




</div>

</section>








<?php include '../footer.php'?> 
