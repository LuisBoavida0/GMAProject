<?php
include("../PHP/Config.php");
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case "GetUnpaidQuotas":
            session_start();
            $query = $db->prepare("SELECT id, Nome, Sexo, DataDeInscricao, DataDeQuotas, Email, UserType FROM users WHERE DataDeQuotas < CURRENT_DATE");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($rs);
            break;
        case "PayQuota":
            $date = new DateTime($_REQUEST["OldQuota"]);
            $date = $date->format('Y-m-d');          
            
            $query = $db->prepare("UPDATE users SET DataDeQuotas = '" . $date . "' AND QuotasPayGiven = 0 WHERE id = '" . $_REQUEST["id"] . "';");
            $query->execute();            
            echo 'success';
            break;
    }
}
