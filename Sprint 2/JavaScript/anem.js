// Open the Modal
function openModal(gallery) {
  document.getElementById(gallery).style.display = "block";
}

// Close the Modal
function closeModal(gallery) {
  document.getElementById(gallery).style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex, gallery);

// Next/previous controls
function plusSlides(n, o) {
  showSlides(slideIndex += n, o);
}

// Thumbnail image controls
function currentSlide(n, o) {
  showSlides(slideIndex = n, o);
}

function showSlides(n, o) {
  var i;
  var slides = document.getElementsByClassName(o);
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}
