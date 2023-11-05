// Selecciona el elemento de entrada de texto
var inputElement = document.getElementById('campo-texto');

var miInput = document.getElementById('campo-password'); // Reemplaza 'miCampoDeTexto' con el ID de tu elemento de entrada

// Agrega un detector de eventos 'input' al elemento de entrada


let typingTimer;
    const doneTypingInterval = 1000;

inputElement.addEventListener('input', function() {

var miImagen = document.getElementById('miImagen');

// Cambia la URL de la imagen
miImagen.src = 'img/movimiento-de-brazos.gif';
     
    

clearTimeout(typingTimer);
typingTimer = setTimeout(function() {
    var miImagen = document.getElementById('miImagen');

    // Cambia la URL de la imagen
    miImagen.src = 'img/posicion-normal.png';
}, 200);
    
});


/* var miCheckbox = document.getElementById('check-image');

// Agregar un detector de eventos para el evento 'change'
miCheckbox.addEventListener('change', function() {
  // Verificar si el checkbox está marcado
  if (miCheckbox.checked) {
    var miImagen = document.getElementById('miImagen');

    // Cambia la URL de la imagen
    miImagen.src = 'img/ver-unpoquito.png';
         
  } else{
    var miImagen = document.getElementById('miImagen');

    // Cambia la URL de la imagen
    miImagen.src = 'img/no-ver.png';
  }
}); */


miInput.addEventListener('focus', () => {
   
    var miImagen = document.getElementById('miImagen');

    // Cambia la URL de la imagen
    miImagen.src = 'img/no-ver.png';
  });





  
const toggleButton = document.getElementById('togglePassword');

toggleButton.addEventListener('click', function() {
  if (miInput.type === 'password') {
    miInput.type = 'text';
    var miImagen = document.getElementById('miImagen');

    // Cambia la URL de la imagen
    miImagen.src = 'img/ver-unpoquito.png';
    toggleButton.innerHTML = `<span class="material-symbols-outlined">
    visibility_off
    </span>`
  
  } else {
    miInput.type = 'password';
    toggleButton.innerHTML = `<span class="material-symbols-outlined">
    visibility
    </span>`;
    var miImagen = document.getElementById('miImagen');

    // Cambia la URL de la imagen
    miImagen.src = 'img/no-ver.png';
  }
});

miInput.addEventListener('blur', () => {
    var miImagen = document.getElementById('miImagen');

    // Cambia la URL de la imagen
    miImagen.src = 'img/posicion-normal.png';
  });