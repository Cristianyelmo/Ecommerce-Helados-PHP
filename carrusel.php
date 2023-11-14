<section>

<div class="owl-carousel owl-theme ">
<?php
$con=mysqli_connect('localhost',
'root','','ecommerce-helados-php');

$Forproducts=mysqli_query($con,'SELECT * FROM `producto`');
while ($row=mysqli_fetch_array($Forproducts)){

  if($row['stock'] == 0){

    echo "



    <div class='item pr-4 relative sm:h-[300px] sm:mt-[90px] ' >



 <div class=' absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex flex-col  ' >
  <div class='w-[80px] h-[80px] ml-30 sm:ml-7 md:ml-9 lg:ml-9 xl:ml-9 2xl:ml-14'>
  <img src='../admin/$row[image]'  >
  </div>
<!-- <img src='img/helado-limon.png ' class='w-[90px]' > -->
<h2 class='text-center font-extrabold'>$row[name]</h2>
<input type='hidden' name='name' value='$row[name]'>
<input type='hidden' name='price' value='$row[price]'>
<input type='hidden' name='image' value='$row[image]'>

<div class='text-center'>
<button  class='bg-[#E97C8D] p-4 border border-3 border-black rounded-[40.5px] text-center'>No hay stock</button>
</div>
</div>
  

  <img src='img/nubes2.png' class='' >

    </div>

  
    ";


  }else{

echo "


<form action='insertCart.php' method='POST'>
    <div class='item pr-4 relative sm:h-[300px] sm:mt-[90px] ' >



 <div class=' absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex flex-col  ' >
  <div class='w-[80px] h-[80px] ml-30 sm:ml-7 md:ml-9 lg:ml-9 xl:ml-9 2xl:ml-14'>
  <img src='../admin/$row[image]'  >
  </div>
<!-- <img src='img/helado-limon.png ' class='w-[90px]' > -->
<h2 class='text-center font-extrabold'>$row[name]</h2>
<input type='hidden' name='name' value='$row[name]'>
<input type='hidden' name='price' value='$row[price]'>
<input type='hidden' name='image' value='$row[image]'>

<div class='text-center'>
<button type='submit' name='addCart' class='bg-[#E97C8D] p-4 border border-3 border-black rounded-[40.5px] text-center'>Add Cart</button>
</div>
</div>
  

  <img src='img/nubes2.png' class='' >

    </div>

    </form>
    ";
  }
  }
    ?>

  
    
  
</div>

</section>