<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Number of Socios</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="../JS/NumberOfSocios.js"></script>
    <script src="../JS/EnumTypes.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../CSS/NumberOfSocios.css">
</head>

<?php
include_once '../PHP/Session.php';
IsLoggedInAdmin();
?>

<body onload="GetAllSocios()">
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
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">Sócios</h3>
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                </div>
                <table class="table position-relative">
                    <thead>
                        <tr class="filters">
                            <th><input type="text" class="form-control" placeholder="Nome" disabled></th>
                            <th style="width: 55px"><input type="text" class="form-control" placeholder="Sexo" disabled></th>
                            <th style="width: 134px"><input type="text" class="form-control" placeholder="Data de inscrição" disabled></th>
                            <th style="width: 134px"><input type="text" class="form-control" placeholder="Data de Quotas" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Função" disabled></th>
                            <th style="width: 150px"><input type="text" class="form-control" placeholder="Data de Nascimento" disabled></th>
                        </tr>
                    </thead>
                    <tbody id="TableSociosBody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>