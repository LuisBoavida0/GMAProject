<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Aniversariantes</title>
    <link rel="stylesheet" href="../CSS/UnpaidQuotas.css">
    <script src="../JS/UnpaidQuotas.js"></script>
    <script src="../JS/EnumTypes.js"></script>
</head>

<?php
include_once '../PHP/Session.php';
IsLoggedInAdmin();
?>

<body onload="GetUnpaidQuotas();">
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
                    <a href="ProgrammedEvents.php" class="w3-bar-item w3-button">Eventos programados</a>                    
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
                    <a href="ProgrammedEvents.php" class="w3-bar-item w3-button">Eventos programados</a>                    
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-100">
        <div class="row">
            <div class="col-12">
                <h1>Pagamentos de quotas atrasados: </h1>
                <br><br>
                <div id="UnpaidQuotas">

                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Pagamentos de Quotas</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p>Selecione ate quando as quotas tao pagas</p>
                    <input type="date" id="dateQuotasPaid">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="PayQuota()">Sim</button>
                </div>

            </div>
        </div>
    </div>
</body>

</html>