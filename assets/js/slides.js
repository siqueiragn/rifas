var slideIndex = 1;
var slideAtual = 0;
function myFn() {
    currentSlide(++slideAtual);
    if ( slideAtual == 5 ) slideAtual = 0;

}
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
    clearInterval(myTimer);
    slideAtual = slideIndex;
    myTimer = setInterval(myFn, 3000);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
// Then, later at some future time,
// to restart a new 4 second interval starting at this exact moment in time
    clearInterval(myTimer);
    slideAtual = n;
    myTimer = setInterval(myFn, 3000);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}

$(document).ready(function() {
   myTimer =  setInterval( myFn, 3000);
});
