<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="../../public/css/style.css">

<!-- owl-carrusel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<!--  -->
    <title>Crema del Cielo</title>
</head>
 <div id="preloader" class="bg-[#E4B1BA] w-full h-full flex justify-center m-0 p-0 items-center transition-opacity duration-500 ease-in-out opacity-100">
        <!-- <div id="loader" class="hola">holaaa</div> -->
        <div class="text-center">
        <img src="../../public/img/logo.gif" alt="" class='w-[240px] h-[180px] '>
        </div>
    </div>

    <div id="content" style="display: none;" >
    <?php
session_start();

$count= 0;
/* aqui se calcula cuanto cantidad tiene el array de la session cart */
if(isset($_SESSION['cart'])){

$count=count($_SESSION['cart']);



}





?>
   
<body  class="bg-cover h-screen bg-no-repeat bg-fixed	  top-0 left-0  bg-[url('../../public/img/background-image.jpg')]">

<header class="bg-[url('../../public/img/nubes-header2.png')] h-[140px] sm:h-[180px] md:h-[220px] lg:h-[250px] xl:h-[280px] bg-cover  bg-no-repeat 	  top-0 left-0 z-20">
   

<nav class="md:hidden">
      <div class="navbar">
      
        <div class="container nav-container">
            <input class="checkbox" type="checkbox" name="" id="" />
            <div class="flex justify-center pt-3 ">
<img src='img/Logo.svg' class='pr-2'>
<div class="flex flex-col">
  <h1>Creama del Cielo</h1>
  <h2>Heladeria</h2>
</div>
</div>



            <div class="hamburger-lines z-20 ">
              <span class="line line1"></span>
              <span class="line line2"></span>
              <span class="line line3"></span>
       
            </div>  
          
          <div class="menu-items" style="
    background: #ffd4d49c;
">
            <li><a href="index.php"><span class="material-symbols-outlined">
home
</span>  Home </a></li>
            <li><a href="login.php"><span class="material-symbols-outlined">
login
</span> Login</a></li>
            <li><a href="#"><span class="material-symbols-outlined">
account_circle
</span> Hola,user</a></li>
            <li><a href="cart.php"><span class="material-symbols-outlined">
shopping_cart
</span> Cart (0) </a></li>
           
          </div>

       



        </div>
       
      </div>

   
    </nav>


    <nav class="hidden md:block md:flex md:justify-between">

    <div class="flex justify-center pt-3 ml-8">
<img src='../../public/img/Logo.svg' class='pr-2'>
<div class="flex flex-col">
  <h1>Creama del Cielo</h1>
  <h2>Heladeria</h2>
</div>
</div>





<ul class="flex list-none mr-8 mt-4 space-x-6">





<?php
/* aca muestra que opciones de iconos van a estar en el header depende de la sessiones que esten o no */
if(isset($_SESSION['userxd'])){


         echo "

         <li><a href='index.php'><span class='material-symbols-outlined ml-[8px]'>
         home
         </span> <p> Home</p> </a></li>


         <li><a href='../../backend/user/logout.php'><span class='material-symbols-outlined'>
         logout
         </span><p> Logout</p</a></li>
         
         <li><a href='cart.php'><span class='material-symbols-outlined ml-[8px]'>
         shopping_cart
         </span> <p>Cart  ($count)</p> </a></li>";
}

else if(isset($_SESSION['adminxd'])){


  echo "

         <li><a href='../user/index.php'><span class='material-symbols-outlined ml-[8px]'>
         home
         </span> <p> Home</p> </a></li>
         <li><a href='post-delete-admin.php'><span class='material-symbols-outlined ml-[8px]'>
         home
         </span> <p>Agregar Producto</p> </a></li>

         <li><a href='../../backend/user/logout.php'><span class='material-symbols-outlined'>
         logout
         </span><p> Logout</p</a></li>
         
       ";;
}else{
echo "
<li><a href='index.php'><span class='material-symbols-outlined ml-[8px]'>
         home
         </span> <p> Home</p> </a></li>
<li><a href='login.php'><span class='material-symbols-outlined ml-[8px]'>
login
</span><p> Login</p</a></li>
<li><a href='cart.php'><span class='material-symbols-outlined ml-[8px]'>
         shopping_cart
         </span> <p>Cart (0)</p> </a></li>";
}


?>




            <li><a href="#"><span class="material-symbols-outlined ml-[8px]">
account_circle
</span> <p> Hola,<?php
/* aqui se muestra que nombre se pone al usuario depende si esta o no */
if(isset($_SESSION['userxd'])){


  echo $_SESSION['userxd'];
}else if(isset($_SESSION['adminxd'])) {

  echo $_SESSION['adminxd'];


}else{
  echo "user";
}



?></p></a></a> </li>
         

      </ul>
    </nav>
</header>



<main class=''>