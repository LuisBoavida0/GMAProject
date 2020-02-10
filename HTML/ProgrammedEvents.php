<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Aniversariantes</title>
    <link rel="stylesheet" href="../CSS/ProgrammedEvents.css">
    <script src="../JS/ProgrammedEvents.js"></script>
</head>

<?php
include_once '../PHP/Session.php';
IsLoggedInAdmin();
?>

<body onload="GetProgrammedEvents();">
    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-red w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick='var x = document.getElementById("navDemo");if (x.className.indexOf("w3-show") == -1) {x.className += " w3-show";} else {x.className = x.className.replace(" w3-show", "");}' title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="Home.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
            <a href="Login.php" onclick="$.post('../PHP/Session.php?action=Logout');" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Logout</a>
            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-button w3-padding-large" title="Notifications" onclick="window.location='BackOffice.php'">BackOffice <i class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                    <a href="NumberOfSocios.php" class="w3-bar-item w3-button">Numero de sócios</a>
                    <a href="Aniversariantes.php" class="w3-bar-item w3-button">Aniversariantes</a>
                    <a href="UnpaidQuotas.php" class="w3-bar-item w3-button">Pagamentos atrasados de Quotas</a>
                </div>
            </div>
        </div>

        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
            <a href="Login.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>
            <a href="BackOffice.php" class="w3-bar-item w3-button w3-padding-large">BackOffice</a>
            <div class="w3-dropdown-hover">
                <button class="w3-button w3-padding-large" title="Notifications">Opções<i class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                    <a href="NumberOfSocios.php" class="w3-bar-item w3-button">Numero de sócios</a>
                    <a href="Aniversariantes.php" class="w3-bar-item w3-button">Aniversariantes</a>
                    <a href="UnpaidQuotas.php" class="w3-bar-item w3-button">Pagamentos atrasados de Quotas</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-100">
        <div class="row">
            <div class="col-12">
                <h3 class="mt-5 text-center"> Eventos Programados: </p>
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
            <div class="col-12">
                <form action="../Handlers/ProgrammedEventsHandler.php?action=AddContent" method="post" enctype="multipart/form-data">
                    <h3>Adicionar Conteúdo</h3>

                    <p>Titulo</p>
                    <input type="text" name="Titulo" id="Titulo" placeholder="Titulo" required>
                    <br>

                    <p>Descricao</p>
                    <input type="text" name="Descricao" id="Descricao" placeholder="Descricao" required>
                    <br><br>

                    <input type="file" name="InputFile[]" id="InputFile" multiple="multiple" required>
                    <br><br>

                    <p>Data de Evento</p>
                    <input type="date" name="DataDeEvento" id="DataDeEvento" required>
                    <br><br>

                    <label><input type="checkbox" value="P" name="PublicEvent" id="PublicEvent"> Evento público</label>
                    <br><br>

                    <input type="submit" value="Enviar" name="submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>