<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transición de Imagen</title>
  <style>
    #contenedor {
      position: relative;
      width: 300px;
      height: 300px;
      overflow: hidden;
    }

    #imagen {
      position: absolute;
      bottom: 0;
      opacity: 0;
      transition: opacity 1s, transform 1s;
    }

    #contenedor:hover #imagen {
      opacity: 1;
      transform: translateY(-100%);
    }
  </style>
</head>
<body>

<div id="contenedor">
  <img src="public/img/dibujo-mensaje2.png" alt="Imagen" id="imagen">
</div>

</body>
</html>