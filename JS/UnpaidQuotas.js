function GetUnpaidQuotas() {
    $.post('../Handlers/UnpaidQuotasHandler.php?action=GetUnpaidQuotas', function (response) {
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
            
            $("#UnpaidQuotas").append(
                "<div id='" + e.id + "'>" +
                    "<h3>" + e.Nome + "</h3>" +
                    "<p> Sexo: " + Sexo + "</p>" +
                    "<p> Data de Inscrição: " + e.DataDeInscricao + "</p>" +
                    "<p> Data de Quotas: " + e.DataDeQuotas + "</p>" +
                    "<p> Email: " + e.Email + "</p>" +
                    "<p> Tipo de Utilizador: " + UserType + " </p>" +
                    "<p class=\"d-inline-block mr-3\">Já pagou as quotas? </p>" +
                    "<button class=\"d-inline-block btn btn-warning\" data-toggle=\"modal\" data-target=\"#myModal\" onclick=\"PayQuotaModalOpen(" + e.id + ", '" + e.DataDeQuotas + "')\">Pagar a quota</button>" +
                "</div> <br><br>"
            );
        });
    });
}

var currentIDQuota = 0;
var QuotasDate = "";
function PayQuotaModalOpen(id, date) {
    currentIDQuota = id;
    QuotasDate = date;
}

function PayQuota() {
    if ($("#dateQuotasPaid").val()) {
        $.post('../Handlers/UnpaidQuotasHandler.php?action=PayQuota&id=' + currentIDQuota + '&OldQuota=' + $("#dateQuotasPaid").val(), function (response) {
            if (response == "success") {
                alert("Quotas pagas com successo");
                location.reload();
            } else {
                alert("Ocorreu um erro inesperado, por favor tente outra vez");
                location.reload();
            }
        });
    } else {
        alert("Tem que escolher a data de quando acaba a quota paga");
    }    
}
