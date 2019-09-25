<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Socio</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="../JS/Socio.js"></script>
    <script src="../JS/EnumTypes.js"></script>
</head>

<body onload="GetSocioData()">
    <div class="container">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td colspan="1">
                        <div class="well form-horizontal">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nome</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="Nome" placeholder="Nome" class="form-control" required="true" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Sexo</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                                            <select class="selectpicker form-control" id="Sexo">
                                                <option id="M" value="0">Masculino</option>
                                                <option id="F" value="0">Feminino</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Idade</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-sort-by-order"></i></span><input id="Idade" placeholder="Idade" class="form-control" required="true" type="number"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Data de Inscrição</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span><input id="DataDeInscricao" placeholder="Data de inscrição" class="form-control" required="true" type="date"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Data de Quotas</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span><input id="DataDeQuotas" placeholder="Data de Quotas" class="form-control" required="true" type="date"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Email</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input id="Email" placeholder="Email" class="form-control" required="true" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Função</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-inbox"></i></span>
                                            <select class="selectpicker form-control" id="Funcao">
                                                <option id="0" value="0">Socio</option>
                                                <option id="1" value="1">Presidente</option>
                                                <option id="2" value="2">VicePresidente</option>
                                                <option id="3" value="3">Tesoureiro</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Data de Nascimento</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span><input id="DataDeNascimento" placeholder="Data de Nascimento" class="form-control" required="true" type="date"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3"></div>
                                        <button class="col-xs-6 col-md-3 btn btn-primary" onclick="Save()">Salvar</button>
                                        <button class="col-xs-6 col-md-3 btn btn-danger" onclick="Cancel()">Cancelar</button>
                                        <div class="col-md-3"></div>
                                        <div clas></div>
                                        <button class="col-xs-12 col-md-6 btn btn-warning" onclick="Cancel()">Cancelar</button>
                                </div>
                            </fieldset>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>