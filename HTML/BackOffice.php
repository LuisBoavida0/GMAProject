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
    <title>BackOffice</title>
    <link rel="stylesheet" href="../CSS/BackOffice.css">
    <script src="../JS/BackOffice.js"></script>
</head>

<body onload="GetNumbers()">
    <div class="container">
        <div class="row">
            <div class="col-md-3" onclick="NumberOfSocios()">
                <div class="card-counter primary">
                    <i class="fa fa-users"></i>
                    <span class="count-numbers" id="NumberOfSocios"></span>
                    <span class="count-name">Sócios</span>
                </div>
            </div>

            <div class="col-md-3" onclick="NumberOfAniversariantes()">
                <div class="card-counter danger">
                    <i class="fa fa-birthday-cake"></i>
                    <span class="count-numbers" id="NumberOfAniversariantes"></span>
                    <span class="count-name">Aniversariantes</span>
                </div>
            </div>

            <div class="col-md-3" onclick="UnpaidQuotas()">
                <div class="card-counter success">
                    <i class="fas fa-coins"></i>
                    <span class="count-numbers" id="UnpaidQuotas"></span>
                    <span class="count-name">Quotas atrasadas</span>
                </div>
            </div>

            <div class="col-md-3"onclick="ProgrammedEvents()">
                <div class="card-counter info">
                    <i class="fas fa-calendar-alt"></i>
                    <span class="count-numbers" id="ProgrammedEvents"></span>
                    <span class="count-name">Eventos programados</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>