




  document.addEventListener("DOMContentLoaded", function() {
    var contenedor = document.getElementById('texto');
    var texto = contenedor.textContent;
    var index = 0;

    function escribirTexto() {
      contenedor.textContent = texto.slice(0, index);
      index++;

      if (index <= texto.length) {
        setTimeout(escribirTexto, 50); // Ajusta la velocidad de escritura aquí
      }
    }

    escribirTexto(); // Inicia la animación cuando se carga la página
  });
