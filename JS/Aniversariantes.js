function GetAniversariantes() {
    $.post('../Handlers/AniversariantesHandler.php?action=GetAniversariantes', function (response) {
        var ParsedResponse = JSON.parse(response);

        ParsedResponse.forEach(e => {
            var Sexo = "";
            if (e.Sexo == "0")
                Sexo = "Masculino";
            else
                Sexo = "Feminino";
            
            var UserType = "";
            if (e.UserType == EnumUserType.Presidente)
                UserType = "Presidente";
            else if (e.UserType == EnumUserType.VicePresidente)
                UserType = "Vice Presidente";
            else if (e.UserType == EnumUserType.Socio)
                UserType = "Sócio(a)";
            else if (e.UserType == EnumUserType.Tesoureiro)
                UserType = "Tesoureiro(a)";
            
            $("#Aniversariantes").append(
                "<div id='" + e.id + "'>" +
                    "<h3>" + e.Nome + "</h3>" +
                    "<p> Sexo: " + Sexo + "</p>" +
                    "<p> Data de Inscrição: " + e.DataDeInscricao + "</p>" +
                    "<p> Data de Quotas: " + e.DataDeQuotas + "</p>" +
                    "<p> Email: " + e.Email + "</p>" +
                    "<p> Tipo de Utilizador: " + UserType + " </p>" +
                "</div> <br><br>"
            );
        });
    });
}