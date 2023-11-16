const imageInput = document.getElementById('image-input');
    const imagePreview = document.getElementById('image-preview');

    imageInput.addEventListener('change', function() {
      const file = imageInput.files[0];
      if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
          imagePreview.src = e.target.result;
        };

        reader.readAsDataURL(file);
      } else {
        imagePreview.src = '';
      }
    });