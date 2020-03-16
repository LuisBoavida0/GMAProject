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
    var Descricao = "";
    ParsedResponse.forEach(e => {
      ItemsCounter++;
      Descricao = e.Descricao.replace(/\r\n|\r|\n/g,"<br />");

      $("#EventTitle").html(e.Titulo);

      $("#SlideshowContainerDiv").prepend(
        "<div class='mySlides fade show'>" +
        "<div class='numbertext'>" + ItemsCounter + " / " + ParsedResponse.length + "</div>" +
        "<img src='../Files/FilesSended/" + e.ficheiro + "' class='img-slider'>" +
        "</div>"
      );

      $("#CurrentSlidesDiv").append(
        "<span class='dot' onclick='currentSlide(" + ItemsCounter + ")'></span>"
      );
    });

    $("#CurrentSlidesDiv").append(
      "<p class=\"text-center description\">" + Descricao + "</p>"
    );

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