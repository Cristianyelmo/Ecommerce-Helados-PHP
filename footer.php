</main>

 <footer class="bg-[url('img/nubes-footer2.png')] h-[320px] sm:h-[420px] lg:h-[620px] xl:h-[320px] bg-cover bg-no-repeat 	  top-0 left-0 z-20 relative">
<h2 class="text-center absolute inset-x-0 mx-auto w-1/2 bottom-10">Nuestra mision es llevar helados a tu hogar xd</h2>
</footer> 





    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>
  </script>
  
</body>
</div>
<script>

window.addEventListener("load", function () {
       setTimeout(function () {
        document.getElementById("preloader").style.display = "none";
        document.getElementById("content").style.display = "block";
        document.getElementById("preloader").classList.add("opacity-0");
    }, 2000);
   
});  


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
  <script src="../register.js"></script>
  <script src="../admin-photo.js"></script>
</html>