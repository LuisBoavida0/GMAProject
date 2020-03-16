function GetEvents() {
  $.post('../Handlers/HomeHandler.php?action=GetEvents', function (response) {
    var ParsedResponse = JSON.parse(response);

    var ItemsCounter = 0;
    ParsedResponse.forEach(e => {
      ItemsCounter++;
      
      $("#SlideshowContainerDiv").append(
        "<div class='mySlides Events-Slides fade show'>" +
          "<div class='numbertext'>" + ItemsCounter + " / " + ParsedResponse.length + "</div>" +
          "<img src='../Files/FilesSended/" + e.ficheiro + "' onclick='window.location = \"SingleEvent.php?" + e.id + "\";' class='img-slider'>" +
          "<div class='text'>" + e.Titulo + "</div>" +
          "<div class='date'>Data do evento: " + DateConvert(new Date(e.DataDeEvento)) + "</div>" +
        "</div>"        
      );

      $("#CurrentSlidesDiv").append(
        "<span class='dot' onclick='currentSlide(" + ItemsCounter + ")'></span>"
      );
    });
    showSlides(slideIndex);

  });
}

function DateConvert(date){
  var data = date,
      dia  = data.getDate().toString(),
      diaF = (dia.length == 1) ? '0'+dia : dia,
      mes  = (data.getMonth()+1).toString(), //+1 pois no getMonth Janeiro começa com zero.
      mesF = (mes.length == 1) ? '0'+mes : mes,
      anoF = data.getFullYear();
  return diaF+"-"+mesF+"-"+anoF;
}

/* Slider Code */
var slideIndex = 1;

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides Events-Slides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = slides.length }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}
/* End Slider Code */

/*SlideShow*/
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides Home-slides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) { myIndex = 1 }
  x[myIndex - 1].style.display = "block";
  setTimeout(carousel, 4000);
}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
/* END SlideShow */