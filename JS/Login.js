function Login() {
    $.post('../Handlers/LoginHandler.php?action=Login&Email=' + $("#Email").val() + '&Password=' + $("#Password").val(), function (response) {
        if(response == "Admin" || response == "Table") {
            window.location = "../HTML/BackOffice.php";
        }
        else if (response == "Socio") {
            alert("Um sócio não tem acesso ao BackOffice");
        }
        else {
            alert("Credenciais erradas");
        }
    });
}