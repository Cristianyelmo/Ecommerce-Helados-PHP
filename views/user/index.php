<?php include '../../includes/header.php'?>
<!-- animacion y presentacion -->
<section class='flex flex-wrap justify-center ' >

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


if(isset($_SESSION['errors']) && count( $_SESSION['errors'])!== 0){
    
  foreach($_SESSION['errors'] as $message){
  
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



<div class="relative  flex justify-center  menu-index" style="
    z-index: -1;
">
<div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">

  <div class='w-[350px] ml-6'>
  <img src="../../public/img/cvgxcgv2.gif" alt="" >
  </div>
  </div> 
  <img src='../../public/img/nubes2.png' class='w-[500px]' >

</div>





<div class="flex justify-center lg:mt-[200px]">

<p class="text-center font-extrabold text-5xl text-contorno">Helados Crema del Cielo</p>

</div>





</section>


  <!-- carrusel productos -->







  <h1 class="text-center mt-[90px] font-extrabold text-3xl">NUESTROS PRODUCTOS</h1>


<?php include '../../includes/carrusel.php'?>

<!-- categorias -->

 <section>
<h1 class="text-center mt-[90px] font-extrabold text-3xl">CATEGORIAS</h1>

<!-- en esta section se linkea las categorias para obtener el GET id -->


<div class='flex flex-wrap justify-center mt-[90px]'>

  <a href="../../backend/user/category-backend.php?categoriaxd=Conos" class="bg-[#F2C0C3] bg-opacity-50 shadow-custom m-3 h-[320px] w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 p-2 overflow-hidden">

<h2 class='text-right font-extrabold text-4xl'>Conos</h2>
<img src='../../public/img/helado-limon.png ' class='h-[520px]' >



</a>




<a href="../../backend/user/category-backend.php?categoriaxd=Postres" class="relative bg-[#F2C0C3] bg-opacity-50 shadow-custom m-3 h-[320px] w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 p-2 overflow-hidden">

<h2 class='text-right font-extrabold text-4xl'>Postres</h2>
<img src='../../public/img/postre.png ' class='h-[320px] absolute right-10' >



</a>

<a href="../../backend/user/category-backend.php?categoriaxd=Envase" class="relative bg-[#F2C0C3] bg-opacity-50 shadow-custom m-3 h-[320px] w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 p-2 overflow-hidden">

<h2 class='text-right font-extrabold text-4xl'>Envase</h2>
<img src='../../public/img/Envase-cate.png ' class='h-[320px] w-[620px] absolute right-20' >



</a>


</a>

<a href="../../backend/user/category-backend.php?categoriaxd=Palito" class="relative bg-[#F2C0C3] bg-opacity-50 shadow-custom m-3 h-[320px] w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 p-2 overflow-hidden">

<h2 class='text-right font-extrabold text-4xl'>Palito</h2>
<img src='../../public/img/Palito.png ' class='h-[320px] w-[620px] absolute right-20' >



</a>



<!-- <div class="bg-[#F2C0C3] bg-opacity-50 shadow-custom m-3 h-[320px] max-w-lg overflow-hidden">
<h2>hola</h2>
<img src='img/helado-limon.png ' class='h-[520px]' >

</div> -->


</div>

</section>




<?php include '../../includes/footer.php'?>


