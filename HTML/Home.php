<!DOCTYPE html>
<html lang="en">
<title>GMA</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<link rel="stylesheet" href="../CSS/Home.css">
<script src="../JS/Home.js"></script>


<body onload="GetEvents(); carousel();">

  <!-- Navbar -->
  <div class="w3-top z-index-2">
    <div class="w3-bar w3-red w3-card w3-left-align w3-large">
      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red"
        href="javascript:void(0);"
        onclick='var x = document.getElementById("navDemo");if (x.className.indexOf("w3-show") == -1) {x.className += " w3-show";} else {x.className = x.className.replace(" w3-show", "");}'
        title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="#" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
      <a href="Login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Login</a>
      <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 2</a>
      <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 3</a>
      <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 4</a>
    </div>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
      <a href="Login.php" class="w3-bar-item w3-button w3-padding-large">Login</a>
      <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
      <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
      <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 4</a>
    </div>
  </div>

  <!-- Page content -->
  <div class="w3-content" style="max-width:2000px;margin-top:46px">

    <h2 class="home-title">Grupo Motard Alcochete</h2>
    <!-- Automatic Slideshow Images -->
    <div class="mySlides Home-slides w3-display-container w3-center">
      <img src="../Files/Images/HomePageSlide1.jpg" style="width:100%">
      <div class="w3-display-bottommiddle w3-container w3-text-white w3-hide-small bg-grey-black mb-4">
        <h3>Los Angeles</h3>
        <p><b>We had the best time playing at Venice Beach!</b></p>
      </div>
    </div>
    <div class="mySlides Home-slides w3-display-container w3-center">
      <img src="../Files/Images/HomePageSlide2.jpg" style="width:100%">
      <div class="w3-display-bottommiddle w3-container w3-text-white w3-hide-small bg-grey-black mb-4">
        <h3>New York</h3>
        <p><b>The atmosphere in New York is lorem ipsum.</b></p>
      </div>
    </div>
    <div class="mySlides Home-slides w3-display-container w3-center">
      <img src="../Files/Images/HomePageSlide3.jpg" style="width:100%">
      <div class="w3-display-bottommiddle w3-container w3-text-white w3-hide-small bg-grey-black mb-4">
        <h3>Chicago</h3>
        <p><b>Thank you, Chicago - A night we won't forget.</b></p>
      </div>
    </div>
    <div class="mySlides Home-slides w3-display-container w3-center">
      <img src="../Files/Images/HomePageSlide4.jpg" style="width:100%">
      <div class="w3-display-bottommiddle w3-container w3-text-white w3-hide-small bg-grey-black mb-4">
        <h3>Chicago</h3>
        <p><b>Thank you, Chicago - A night we won't forget.</b></p>
      </div>
    </div>

    <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
      <div>
        <h3 class="mt-5 text-center"> Os nossos eventos </p>
          <div class="slideshow-container" id="SlideshowContainerDiv">
            <!-- Sliders -->

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
          </div>
          <br>

          <div class="text-center" id="CurrentSlidesDiv">
            <!-- CurrentSlides -->
          </div>
      </div>

    </div>
  </div>
  <!-- End Page Content -->

  <!-- Footer -->
  <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p class="w3-medium">Powered by <a href="https://www.lampd.ga" target="_blank">lampd.ga</a>
    </p>
  </footer>

</body>

</html>