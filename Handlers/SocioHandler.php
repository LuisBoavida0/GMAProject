<?php
include("../PHP/Config.php");
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case "GetSocioData":
            session_start();
            $query = $db->prepare("SELECT id, Nome, Sexo, Idade, DataDeInscricao, DataDeQuotas, Email, UserType, DataDeNascimento FROM users WHERE id = '" . $_REQUEST["id"] . "'");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($rs);
            break;
        case "SaveSocioData":
            session_start();
            $query = $db->prepare("UPDATE users SET Nome = '" . $_REQUEST["Nome"] . "', Sexo = '" . $_REQUEST["Sexo"] . "', Idade = '" . $_REQUEST["Idade"] . "', DataDeInscricao = '" . $_REQUEST["DataDeInscricao"] . "', DataDeQuotas = '" . $_REQUEST["DataDeQuotas"] . "', Email = '" . $_REQUEST["Email"] . "', UserType = '" . $_REQUEST["UserType"] . "', DataDeNascimento = '" . $_REQUEST["DataDeNascimento"] . "' WHERE id = '" . $_REQUEST["id"] . "'");
            $query->execute();
            echo "Success";
            break;
    }
}
