<?php
include("../PHP/Config.php");
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case "GetAllSocios":
            session_start();
            $query = $db->prepare("SELECT id, Nome, Sexo, DataDeInscricao, DataDeQuotas, Email, UserType, DataDeNascimento FROM users");
			$query->execute();
			$rs = $query->fetchAll(PDO::FETCH_OBJ);		
			echo json_encode($rs);
            break;
    }
}