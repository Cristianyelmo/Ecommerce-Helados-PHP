<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pausing y Reanudando GIF con JavaScript</title>
  <style>
    /* Puedes aplicar estilos según sea necesario */
  </style>
</head>
<body>

<img src="public/img/cvgxcgv.gif" alt="GIF" id="miGif">

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var gif = document.getElementById('miGif');

    // Pausar el GIF después de 2 segundos
    setTimeout(function() {
      gif.pause();
    }, 1000);

    // Reanudar el GIF después de 4 segundos
   /*  setTimeout(function() {
      gif.play();
    }, 4000); */
   /*  setTimeout(function() {
      gif.style.display = 'none';
    }, 5000); */
  
  });

  
</script>

</body>
</html>