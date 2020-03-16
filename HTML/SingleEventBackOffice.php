<!DOCTYPE html>
<html lang="en">
<header>
    <title>GMA</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../CSS/SingleEventBackOffice.css">
    <script src="../JS/SingleEventBackOffice.js"></script>
</header>

<?php
include_once '../PHP/Session.php';
IsLoggedInAdmin();
?>

<body onload="GetEvents();">

    <!-- Navbar -->
    <div class="w3-top">
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

    <div>
        <h3 class="mt-5 pt-5 text-center" id="EventTitle"> Próximos eventos </h3>
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

    <br><br>

    <div class="text-center">
        <button class="btn btn-warning text-white pl-4 pr-4 pt-2 pb-2" data-toggle="modal" data-target="#myModal"
            onclick="Editar()"> Editar </button>
        <button class="btn btn-danger pl-4 pr-4 pt-2 pb-2" onclick="DeleteEvent();"> Apagar </button>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="modalId"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="col-12">
                        <h3>Titulo</h3>
                        <input type="text" id="Titulo">
                    </div> <br>

                    <div class="col-12">
                        <h3>Descrição</h3>
                        <textarea id="Descricao" cols="30" rows="10"></textarea>
                    </div> <br>

                    <div class="col-12">
                        <h3>Data de Evento</h3>
                        <input type="date" id="EventDate">
                    </div> <br>

                    <div class="col-12">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="PublicCheckbox"> Publico
                            </label>
                        </div>
                    </div> <br>

                    <div>
                        <div id="EditImgDiv" class="overflow-auto" style="display: -webkit-box;">

                        </div>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <form action="../Handlers/SingleEventBackOfficeHandler.php?action=AddImgs" method="post" enctype="multipart/form-data">
                        <input type="file" name="InputFile[]" id="InputFile" multiple="multiple" required>
                        <input type="hidden" name="Id" id="idHidden">
                        <input type="submit" value="Confirmar" name="submit">
                    </form>
                    <button type="button" class="btn btn-warning text-white" data-dismiss="modal" onclick="EditEvent()">Editar</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-64 w3-center w3-opacity">
        <div class="w3-xlarge w3-padding-32">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-twitter w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
        </div>
        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </footer>

</body>

</html>