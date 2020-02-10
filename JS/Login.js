function Login() {
    $.post('../Handlers/LoginHandler.php?action=Login&Email=' + $("#Email").val() + '&Password=' + $("#Password").val(), function (response) {
        if(response == "Admin" || response == "Socio" || response == "Table") {
            window.location = "../HTML/BackOffice.php";
        }
        else {
            alert("Credenciais erradas");
        }
    });
}