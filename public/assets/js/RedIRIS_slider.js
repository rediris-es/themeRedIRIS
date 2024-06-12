var imageDataElement = document.getElementById('imageData');
var images = imageDataElement.dataset.images.split(',').filter(Boolean);

var index = Math.floor(Math.random() * images.length);

function changeImage() {

  var imageContainer = document.getElementById('imageContainer');
  
  // Encuentra la imagen existente y aplícale la animación de salida
  var existingImage = imageContainer.querySelector('img');
  
  if (existingImage) {
    existingImage.classList.add('slide-out');
    setTimeout(function() {
      // Solo elimina la imagen existente si ha terminado su animación de salida
      if (existingImage.classList.contains('slide-out')) {
        imageContainer.removeChild(existingImage);
      }
    }, 1000);
  }

  // Crea una nueva imagen y aplícale la animación de entrada
  var img = document.createElement('img');
  img.className = 'img-fluid position-absolute top-0 start-0 end-0 bottom-0 img-cover slide-in';
  img.src = images[index];
  imageContainer.appendChild(img); // Agregamos la nueva imagen al contenedor

  index = (index + 1) % images.length; // Esto hace que el índice vuelva a 0 cuando llega al final del array
}

// Carga la primera imagen
changeImage();

// Cambia la imagen cada 6 segundos
setInterval(changeImage, 6000);