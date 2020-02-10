function GetNumbers() {
    $.post('../Handlers/BackOfficeHandler.php?action=GetNumberOfSocios', function (response) {
        $("#NumberOfSocios").html(response);
    });

    $.post('../Handlers/BackOfficeHandler.php?action=GetNumberOfAniversariantes', function (response) {
        $("#NumberOfAniversariantes").html(response);
    });

    $.post('../Handlers/BackOfficeHandler.php?action=GetUnpaidQuotas', function (response) {
        $("#UnpaidQuotas").html(response);
    });

    $.post('../Handlers/BackOfficeHandler.php?action=GetProgrammedEvents', function (response) {
        $("#ProgrammedEvents").html(response);
    });
}

function NumberOfSocios() {
    window.location = "../HTML/NumberOfSocios.php";
}

function NumberOfAniversariantes() {
    window.location = "../HTML/Aniversariantes.php";
}

function UnpaidQuotas() {
    window.location = "../HTML/UnpaidQuotas.php";
}

function ProgrammedEvents() {
    window.location = "../HTML/ProgrammedEvents.php";
}