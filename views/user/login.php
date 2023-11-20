<?php include '../../includes/header.php'?>

<section class="flex justify-center ">

<?php
/* aqui se muestra los mensajes de la session errors si existe */
if(isset($_SESSION['message-login']) && count( $_SESSION['message-login'])!== 0){
    
foreach($_SESSION['message-login'] as $message){

 echo "<div class='whatsapp-container' id='imagen-fixer'>
 <div class='relative'>
 <p clas='absolute top-[30px] left-0 z-10'style='
 position: absolute;
 top: 40px;
' id='texto'>$message</p>
 <img src='../../public/img/dibujo-mensaje2.png' class='whatsapp-icon w-[160px] h-[160px]' alt=''>
        </div>
      
      <!--   <div class='whatsapp-icon w-[560px] h-[560px]'></div> -->
    </div>";

 

 
}
}







?>



<div  class="bg-[#FFFFFF] bg-opacity-30 shadow-custom m-3 p-4 w-[500px]" >

    <h2 class="text-4xl text-center font-extrabold">Login</h2>
<img src="../../public/img/posicion-normal.png" class="ml-3"  id="miImagen"  />
<form action="../../backend/user/login1.php" method='POST'>
<h2>username</h2>
<input type="text" name="name" id="campo-texto" class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
<h2>password</h2>
 <input type="password" name="password" id="campo-password"  class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
 
 <p class='mt-[20px]'>No tienes cuenta? <a href="register.php" class='border-b border-black hover:border-gray-700'>Registrate!</a></p>
<div class="flex justify-end space-x-2 mt-4">
<button id="togglePassword" type='button'  class="text-black "><span class="material-symbols-outlined">
visibility
</span></button>

<button type="submit" class="bg-[#E97C8D] px-4 py-2 border border-2 border-black rounded-[40.5px] text-center ">Entrar</button>
</form>



</div>


</div>


</section>



<?php include '../../includes/footer.php'?>