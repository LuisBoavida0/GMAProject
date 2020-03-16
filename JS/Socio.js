function GetSocioData() {
    const urlParams = new URLSearchParams(window.location.search);
    $.post('../Handlers/SocioHandler.php?action=GetSocioData&id=' + urlParams.get('id'), function (response) {
        var JsonObject = JSON.parse(response);
        JsonObject = JsonObject[0];
        $("#Nome").val(JsonObject.Nome);

        if (JsonObject.Sexo == 0)
            $("#Sexo").val('0');
        else
            $("#Sexo").val('1');

        $("#DataDeInscricao").val(JsonObject.DataDeInscricao);

        $("#DataDeQuotas").val(JsonObject.DataDeQuotas);

        $("#Email").val(JsonObject.Email);

        if (JsonObject.UserType == EnumUserType.Presidente)
            $("#Funcao").val('1');
        else if (JsonObject.UserType == EnumUserType.VicePresidente)
            $("#Funcao").val('2');
        else if (JsonObject.UserType == EnumUserType.Socio)
            $("#Funcao").val('0');
        else if (JsonObject.UserType == EnumUserType.Tesoureiro)
            $("#Funcao").val('3');

        $("#DataDeNascimento").val(JsonObject.DataDeNascimento);
    });
}

function Save() {
    const urlParams = new URLSearchParams(window.location.search);
    $.post('../Handlers/SocioHandler.php?action=SaveSocioData&id=' + urlParams.get('id') +
        '&Nome=' + $("#Nome").val() +
        '&Sexo=' + $("#Sexo").val() +
        '&DataDeInscricao=' + $("#DataDeInscricao").val() +
        '&DataDeQuotas=' + $("#DataDeQuotas").val() +
        '&Email=' + $("#Email").val() +
        '&UserType=' + $("#Funcao").val() +
        '&DataDeNascimento=' + $("#DataDeNascimento").val(),
        function (response) {
            if (response == "Success")
                location.reload();
        });
}

function Cancel() {
    window.location = "NumberOfSocios.php";
}

function Delete() {
    const urlParams = new URLSearchParams(window.location.search);
    $.post('../Handlers/SocioHandler.php?action=DeleteSocio&id=' + urlParams.get('id'), function (response) {
        window.location = "NumberOfSocios.php";
    });
}