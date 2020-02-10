<?php
include("../PHP/Config.php");
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case "GetSingleEvents":
            session_start();
            $query = $db->prepare("SELECT events.Titulo, events.Descricao, events.DataDeEvento, eventsfiles.ficheiro FROM events, eventsfiles WHERE events.id = eventsfiles.idEvent AND events.publico = 1 AND events.id = " . $_REQUEST["id"]);
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($rs);
            break;
    }
}
