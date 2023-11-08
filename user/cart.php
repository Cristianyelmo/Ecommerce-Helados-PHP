<?php include '../header.php'?>


<section class="flex justify-center
" >




<div class="flex flex-col w-[600px]">


<div class="bg-[#FFFFFF] bg-opacity-30 shadow-custom  m-3 p-4 max-w-xl flex flex-col justify-center">
<?php

echo $_SESSION['contador'];
echo var_dump($_SESSION['contador']);
if(isset($_SESSION['cart'])){
 
    foreach($_SESSION['cart'] as  $key =>  $value){


echo "

<form action='insertCart.php' method='POST'>
<div class='flex justify-center  '>




    <div class='flex justify-center flex-col '>



  







  
        <div class='flex justify-center '>
           

</span>
<img src='../admin/$value[productImage]' alt='' class='w-[35px] mr-[10px]'>
</div>

</div>


<div>


<div class='sm:flex sm:flex-col sm:snap-center sm:ml-[60px] sm:mt-[70px] '>
<button name='remove' class='bg-transparent'><span class='material-symbols-outlined ml-[230px]'>
cancel
</span></button>
<h2 class='text-center font-extrabold'>$value[productName]</h2>
<p class='text-center text-3xl'>2.500$</p>


<div class='flex justify-center space-x-4 mb-6 mt-6'>
<button name='menos' class='text-black p-4 rounded-full bg-[#D9D9D9] bg-opacity-30 shadow-custom w-[50px] h-[50px]'>-</button>

<div class='bg-[#D9D9D9] bg-opacity-30 p-4 shadow-custom text-black w-[50px] h-[50px] text-center'>
<h3 >$value[productQuantity]</h3>

<input type='hidden' name='item' value='$value[productName]'>
</div>
<button name='mas' class='text-black  p-4 rounded-full bg-[#D9D9D9] bg-opacity-30 shadow-custom w-[50px] h-[50px]'>+</button>
</div>

<input type='hidden' name='name' value='$value[productName]'>
<input type='hidden' name='price' value='$value[productPrice]'> 
<input type='hidden' name='image' value='$value[productImage]'> 




</div>

</div>



<!--  -->


</div>
</form>


<!-- dii -->

";
}

}

?>

<!--  -->
</div>





<div class="bg-[#FFFFFF] bg-opacity-30 shadow-custom  m-3 p-4 max-w-xl flex flex-col justify-center">


<h2 class="text-center font-extrabold text-3xl">Total</h2>
<h3 class="text-center">2.500$</h3>
<div class="text-center">
<button class="bg-[#E97C8D] p-4 border border-3 border-black rounded-[40.5px] text-center">Buy Now</button>
</div>

</div>





</div>

</section>







<?php include '../footer.php'?> 