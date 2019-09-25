function GetSocioData() {
    const urlParams = new URLSearchParams(window.location.search);
    $.post('../Handlers/SocioHandler.php?action=GetSocioData&id=' + urlParams.get('id'), function (response) {
        var JsonObject = JSON.parse(response);
        JsonObject = JsonObject[0];
        $("#Nome").val(JsonObject.Nome);

        if (JsonObject.Sexo == 0)
            $("#M").attr("selected", "selected");
        else
            $("#F").attr("selected", "selected");

        $("#Idade").val(JsonObject.Idade);

        $("#DataDeInscricao").val(JsonObject.DataDeInscricao);

        $("#DataDeQuotas").val(JsonObject.DataDeQuotas);

        $("#Email").val(JsonObject.Email);

        if (JsonObject.UserType == EnumUserType.Presidente)
            $("#1").attr("selected", "selected");
        else if (JsonObject.UserType == EnumUserType.VicePresidente)
            $("#2").attr("selected", "selected");
        else if (JsonObject.UserType == EnumUserType.Socio)
            $("#0").attr("selected", "selected");
        else if (JsonObject.UserType == EnumUserType.Tesoureiro)
            $("#3").attr("selected", "selected");

        $("#DataDeNascimento").val(JsonObject.DataDeNascimento);
    });
}

function Save() {
    const urlParams = new URLSearchParams(window.location.search);
    $.post('../Handlers/SocioHandler.php?action=SaveSocioData&id=' + urlParams.get('id') +
        '&Nome=' + $("#Nome").val() +
        '&Sexo=' + $("#Sexo").val() +
        '&Idade=' + $("#Idade").val() +
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