const toggleButton2 = document.getElementById('togglePassword2');

  var miInput2 = document.getElementById('campo-password2');
  var miInput3 = document.getElementById('campo-password3');
toggleButton2.addEventListener('click', function() {
  if (miInput2.type === 'password') {
    miInput2.type = 'text';
    miInput3.type = 'text';
    toggleButton2.innerHTML = `<span class="material-symbols-outlined">
    visibility_off
    </span>`
  
  } else {
    miInput2.type = 'password';
    miInput3.type = 'password';
    toggleButton2.innerHTML = `<span class="material-symbols-outlined">
    visibility
    </span>`;
   

    
  }
});