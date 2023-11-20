</main>

 <footer class="bg-[url('../../public/img/nubes-footer2.png')] h-[320px] sm:h-[420px] lg:h-[620px] xl:h-[320px] bg-cover bg-no-repeat 	  top-0 left-0 z-20 relative">
<div class=" text-center absolute inset-x-0 mx-auto w-1/2 bottom-10 space-x-5">
<i class=" text-6xl fa-brands fa-instagram"></i>
<i class=" text-6xl fa-brands fa-facebook"></i>
</div>
</footer> 





    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>
  </script>
  
</body>
</div>
<script>
  /* script hecho para cargar el preloader  */

window.addEventListener("load", function () {
       setTimeout(function () {
        document.getElementById("preloader").style.display = "none";
        document.getElementById("content").style.display = "block";
        document.getElementById("preloader").classList.add("opacity-0");
        var imagen = document.getElementById('imagen-fixer');
/*   imagen.classList.add('oculto'); */
imagen.classList.add('aparecer');
/* aqui pongo la imagen del error que quede 5 segundos y despues se vaya */
        setTimeout(function() {
           var imagen = document.getElementById('imagen-fixer');
/*   imagen.classList.add('oculto'); */
imagen.classList.remove('aparecer');
  <?php
  unset($_SESSION['message-login']);
  unset($_SESSION['errors']);?>

}, 5000);   

setTimeout(function() {
  var imagen = document.getElementById('imagen-fixer');
  imagen.style.display = 'none';
}, 6000);





    }, 2000);
   
});  
 /* script hecho para cargar el carrusel  */

  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})












  </script>
  <style>
  .owl-carousel .owl-dots {
  display:none;
}

.owl-carousel .owl-nav span {
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  background-color: #ffffff47;
  color: black;
  padding: 0px 20px;
  border-radius: 30px;
  font-size:40px; /* La mitad de 30px para hacerlo circular */
}

</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/c63e399f09.js" crossorigin="anonymous"></script>
  <script src="../../public/js/register.js"></script>
  <script src="../../public/js/register2.js"></script>
  <script src="../../public/js/admin-photo.js"></script>
  <script src="../../public/js/text-message.js"></script>



<script>
/* aqui lo que hago es capturar el div de la imagen fixer
con el mensaje y despues de 5 segundos ocultar y eliminar la sessino
mensagge-login */








</script>

</html>