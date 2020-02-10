<?php
include("../PHP/Config.php");
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {      
        case "GetUnpaidQuotas":
            session_start();
            $query = $db->prepare("SELECT id, Nome, Sexo, Idade, DataDeInscricao, DataDeQuotas, Email, UserType FROM users WHERE DataDeQuotas < CURRENT_DATE");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($rs);
            break;      
    }
}
