<?php include '../header.php'?>

<section class="flex justify-center ">


<div  class="bg-[#FFFFFF] bg-opacity-30 shadow-custom m-3 p-4 w-[500px]" >

    <h2 class="text-4xl text-center font-extrabold">Login</h2>
<img src="img/posicion-normal.png" class="ml-3"  id="miImagen"  />
<form action="login1.php" method='POST'>
<h2>username</h2>
<input type="text" name="name" id="campo-texto" class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
<h2>password</h2>
 <input type="password" name="password" id="campo-password"  class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
 

<div class="flex justify-end space-x-2 mt-4">
<button id="togglePassword" class="text-black "><span class="material-symbols-outlined">
visibility
</span></button>
<button type="submit" class="bg-[#E97C8D] px-4 py-2 border border-2 border-black rounded-[40.5px] text-center ">Entrar</button>
</form>
</div>


</div>


</section>

<?php include '../footer.php'?> 