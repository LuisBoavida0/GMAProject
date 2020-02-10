<?php
include("../PHP/Config.php");
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {      
        case "GetAniversariantes":
            session_start();
            $query = $db->prepare("SELECT id, Nome, Sexo, Idade, DataDeInscricao, DataDeQuotas, Email, UserType FROM users WHERE DATE_FORMAT(DataDeNascimento, '%m-%d') = DATE_FORMAT(CURRENT_DATE, '%m-%d')");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($rs);
            break;      
    }
}
