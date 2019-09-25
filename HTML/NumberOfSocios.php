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
    <link rel="stylesheet" href="../CSS/NumberOfSocios.css">
</head>

<body onload="GetAllSocios()">
    <div class="container">       
        <div class="row">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">Sócios</h3>
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th><input type="text" class="form-control" placeholder="Nome" disabled></th>
                            <th style="width: 55px"><input type="text" class="form-control" placeholder="Sexo" disabled></th>
                            <th style="width: 55px"><input type="text" class="form-control" placeholder="Idade" disabled></th>
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