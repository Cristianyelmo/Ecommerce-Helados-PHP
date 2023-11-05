<?php include '../header.php'?>

<section class="flex justify-center ">


<div  class="bg-[#FFFFFF] bg-opacity-30 shadow-custom m-3 p-4 w-[500px]" >

    <h2 class="text-4xl text-center font-extrabold">Login</h2>
<img src="img/posicion-normal.png" class="ml-3"  id="miImagen"  />
<h2>username</h2>
<input type="text" id="campo-texto" class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
<h2>password</h2>
 <input type="password" id="campo-password"  class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
 

<div class="flex justify-end space-x-2 mt-4">
<button id="togglePassword" class="text-black "><span class="material-symbols-outlined">
visibility
</span></button>
<button class="bg-[#E97C8D] px-4 py-2 border border-2 border-black rounded-[40.5px] text-center ">Entrar</button>
</div>


</div>


</section>

<?php include '../footer.php'?> 