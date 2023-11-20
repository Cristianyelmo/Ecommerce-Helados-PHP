<section>

<div class="owl-carousel owl-theme ">
<?php

/* Llama a la base de datos y trae todos los productos */

include '../../config/Config.php';
$Forproducts=mysqli_query($Con,'SELECT * FROM `producto`');


/* itera todos los productos */
while ($row=mysqli_fetch_array($Forproducts)){

/* si el producto esta en stock 0 no se puede seleccionar y aparecera
en el boton 'no hay stock',en cambio si hay stock,se puede seleccionar
y guardara la compra en una session */

  if($row['stock'] == 0){

    echo "



    <div class='item pr-4 relative sm:h-[300px] sm:mt-[90px] ' >



 <div class=' absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex flex-col  ' >
 <div class='flex justify-center  sm:ml-7 md:ml-9 lg:ml-9 xl:ml-9 2xl:ml-14'>
 <img src='../../backend/admin/$row[image]'  class='w-[80px] h-[80px] md:mr-[40px] sm:mr-[30px]' >
 </div>
<!-- <img src='img/helado-limon.png ' class='w-[90px]' > -->
<h2 class='text-center font-extrabold'>$row[name]</h2>
<h2 class='text-center font-extrabold '>$row[price]</h2>
<input type='hidden' name='name' value='$row[name]'>
<input type='hidden' name='price' value='$row[price]'>
<input type='hidden' name='image' value='$row[image]'>

<div class='text-center'>
<button  class='bg-[#E97C8D] p-4 border border-3 border-black rounded-[40.5px] text-center'>No stock</button>
</div>
</div>
  

  <img src='../../public/img/nubes2.png' class='' >

    </div>

  
    ";


  }else{

echo "


<form action='../../backend/user/insertCart.php' method='POST'>
    <div class='item pr-4 relative sm:h-[300px] sm:mt-[90px] ' >



 <div class=' absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex flex-col  ' >
  <div class='flex justify-center  sm:ml-7 md:ml-9 lg:ml-9 xl:ml-9 2xl:ml-14'>
  <img src='../../backend/admin/$row[image]'  class='w-[80px] h-[80px] md:mr-[40px]  sm:mr-[30px]' >
  </div>
<!-- <img src='img/helado-limon.png ' class='w-[90px]' > -->
<h2 class='text-center font-extrabold'>$row[name]</h2>
<h2 class='text-center font-extrabold '>$row[price]</h2>
<input type='hidden' name='name' value='$row[name]'>
<input type='hidden' name='price' value='$row[price]'>
<input type='hidden' name='image' value='$row[image]'>

<div class='text-center'>
<button type='submit' name='addCart' class='bg-[#E97C8D] p-4 border border-3 border-black rounded-[40.5px] text-center'>Add Cart</button>
</div>
</div>
  

  <img src='../../public/img/nubes2.png' class='' >

    </div>

    </form>
    
    ";
  }
  }
    ?>


  
    
  
</div>

</section>