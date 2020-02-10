<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Socio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../JS/Socio.js"></script>
    <script src="../JS/EnumTypes.js"></script>
</head>

<?php
include_once '../PHP/Session.php';
IsLoggedInAdmin();
?>

<body onload="GetSocioData()">
    <div class="container mt-5">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>
                        <div>
                            <fieldset>
                                <div class="row pb-2">
                                    <label class="col-md-4 d-flex align-items-center justify-content-end mb-0">Nome</label>
                                    <div class="col-md-8 ">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="Nome" placeholder="Nome" class="form-control" required="true" type="text"></div>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <label class="col-md-4 d-flex align-items-center justify-content-end mb-0">Sexo</label>
                                    <div class="col-md-8 ">
                                        <div class="input-group">
                                            <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                                            <select class="selectpicker form-control" id="Sexo">
                                                <option value="0">Masculino</option>
                                                <option value="1">Feminino</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <label class="col-md-4 d-flex align-items-center justify-content-end mb-0">Idade</label>
                                    <div class="col-md-8 ">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-sort-by-order"></i></span><input id="Idade" placeholder="Idade" class="form-control" required="true" type="number"></div>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <label class="col-md-4 d-flex align-items-center justify-content-end mb-0">Data de Inscrição</label>
                                    <div class="col-md-8 ">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span><input id="DataDeInscricao" placeholder="Data de inscrição" class="form-control" required="true" type="date"></div>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <label class="col-md-4 d-flex align-items-center justify-content-end mb-0">Data de Quotas</label>
                                    <div class="col-md-8 ">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span><input id="DataDeQuotas" placeholder="Data de Quotas" class="form-control" required="true" type="date"></div>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <label class="col-md-4 d-flex align-items-center justify-content-end mb-0">Email</label>
                                    <div class="col-md-8 ">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input id="Email" placeholder="Email" class="form-control" required="true" type="text"></div>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <label class="col-md-4 d-flex align-items-center justify-content-end mb-0">Função</label>
                                    <div class="col-md-8 ">
                                        <div class="input-group">
                                            <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-inbox"></i></span>
                                            <select class="selectpicker form-control" id="Funcao">
                                                <option value="0">Socio</option>
                                                <option value="1">Presidente</option>
                                                <option value="2">VicePresidente</option>
                                                <option value="3">Tesoureiro</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <label class="col-md-4 d-flex align-items-center justify-content-end mb-0">Data de Nascimento</label>
                                    <div class="col-md-8 ">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span><input id="DataDeNascimento" placeholder="Data de Nascimento" class="form-control" required="true" type="date"></div>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-12 offset-md-4 col-md-4 mt-3">
                                        <button class="w-100 btn btn-primary" onclick="Save()">Salvar</button>
                                    </div>
                                    <div class="col-12 col-md-4 mt-3">
                                        <button class="w-100 btn btn-warning" onclick="Cancel()">Cancelar</button>
                                    </div>
                                    <div class="col-12 offset-md-4 col-md-8 mt-3">
                                        <button class="w-100 btn btn-danger" data-toggle="modal" data-target="#myModal">Apagar</button>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Apagar Sócio ?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Têm a certeza que quer apagar este sócio?
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="Delete()">Apagar</button>
                </div>

            </div>
        </div>
    </div>
</body>

</html>