var idFromParam;

function GetEvents() {
  var urlParams = new URLSearchParams(window.location.search);

  var keys = urlParams.keys();
  for (key of keys) {
    idFromParam = key;
  }

  $("#idHidden").val(idFromParam);

  $.post('../Handlers/SingleEventBackOfficeHandler.php?action=GetSingleEvents&id=' + idFromParam, function (response) {
    var ParsedResponse = JSON.parse(response);
    if (ParsedResponse.length == 0) {
      window.location = "home.php";
    }
    var ItemsCounter = 0;
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

      $("#EditImgDiv").prepend("<div class='position-relative background-color-div'> <img src='../Files/FilesSended/" + e.ficheiro + "' class='img-slider'> <button class='top-right-0' onclick='DeleteImg(" + e.id + ", \"" +  e.ficheiro + "\")'> X </button> </div>");

      $("#Titulo").val(e.Titulo);
      $("#Descricao").val(e.Descricao.replace(/<br\s?\/?>/g,"\n"));
      $("#EventDate").val(e.DataDeEvento);

      if (e.publico == 1) {        
        $("#PublicCheckbox").prop('checked', true);
      }
      

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

function DeleteImg(id, fileName) {
  $.post('../Handlers/SingleEventBackOfficeHandler.php?action=DeleteImgFromEvent&id=' + id + '&file=' + fileName, function (response) {
    location.reload();
  });
}

function EditEvent() {
  var isChecked = 0;
  if ($('#PublicCheckbox').is(":checked")) {
    isChecked = 1;
  }

  $.post('../Handlers/SingleEventBackOfficeHandler.php?action=EditEvent&Titulo=' + $("#Titulo").val() +
         '&Descricao=' + $("#Descricao").val().replace(/\r\n|\r|\n/g,"<br />") +
         '&EventDate=' + $("#EventDate").val() +
         '&id=' + idFromParam +
         '&Publico=' + isChecked, function (response) {
    location.reload();
  });
}

function DeleteEvent() {
  $.post('../Handlers/SingleEventBackOfficeHandler.php?action=DeleteEvent&id=' + idFromParam, function (response) {
    location.reload();
  });
}