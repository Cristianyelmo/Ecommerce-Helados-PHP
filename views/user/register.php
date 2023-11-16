<?php include '../../includes/header.php'?>
<?php
/* aqui se muestra los mensajes de la session errors si existe */
if(isset($_SESSION['errors']) && count( $_SESSION['errors'])!== 0){
foreach($_SESSION['errors'] as $error){
    echo '<li>' .  $error .   '<li>';
}
}







?>
<section class="flex justify-center ">
    <div  class="bg-[#FFFFFF] bg-opacity-30 shadow-custom m-3 p-4 w-[500px]" >
    <h2 class="text-4xl text-center font-extrabold">Register</h2>




<form action="../../backend/user/insert.php" method='POST'>
    
    <h2>Correo</h2>
<input name="email" type="email" id="campo-texto" class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
<h2>username</h2>
<input name="name" type="text" id="campo-texto" class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
<h2>password</h2>
 <input name="password" type="password" id="campo-password"  class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
 <h2>repassword</h2>
 <input name="repassword" type="password" id="campo-password"  class="border-2 shadow-custom border-black bg-transparent p-2 w-full">
 <!-- <h2>password</h2>
 <input type="password" id="campo-password"  class="border-2 shadow-custom border-black bg-transparent p-2 w-full"> -->

<div class="flex justify-end space-x-2 mt-4">
<button id="togglePassword" class="text-black "><span class="material-symbols-outlined">
visibility
</span></button>
<button name="submit" type='submit' class="bg-[#E97C8D] px-4 py-2 border border-2 border-black rounded-[40.5px] text-center ">Registrar</button>

</form>



</div>




</div>

</section>


<?php include '../../includes/footer.php'?>