<?php
include("../PHP/Config.php");
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case "GetEvents":
            session_start();
            $query = $db->prepare("SELECT events.id, events.Titulo, events.DataDeEvento, eventsfiles.ficheiro FROM events, eventsfiles WHERE events.id = eventsfiles.idEvent AND events.publico = 1 GROUP BY eventsfiles.idEvent ORDER BY events.DataDeEvento DESC");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($rs);
            break;
    }
}
