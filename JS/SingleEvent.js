function GetEvents() {
  var urlParams = new URLSearchParams(window.location.search);

  var keys = urlParams.keys();
  var idFromParam;
  for (key of keys) {
    idFromParam = key;
  }

  $.post('../Handlers/SingleEventHandler.php?action=GetSingleEvents&id=' + idFromParam, function (response) {
    var ParsedResponse = JSON.parse(response);
    if (ParsedResponse.length == 0) {
      window.location = "home.php";
    }
    var ItemsCounter = 0;
    ParsedResponse.forEach(e => {
      ItemsCounter++;

      $("#EventTitle").html(e.Titulo);

      $("#SlideshowContainerDiv").prepend(
        "<div class='mySlides fade show'>" +
        "<div class='numbertext'>" + ItemsCounter + " / " + ParsedResponse.length + "</div>" +
        "<img src='../Files/FilesSended/" + e.ficheiro + "' class='img-slider'>" +
        "<div class='text'>" + e.Descricao + "</div>" +
        "</div>"
      );

      $("#CurrentSlidesDiv").append(
        "<span class='dot' onclick='currentSlide(" + ItemsCounter + ")'></span>"
      );
    });
    showSlides(slideIndex);

  });
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
  var slides = document.getElementsByClassName("mySlides");
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