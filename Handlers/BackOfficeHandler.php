<?php
include("../PHP/Config.php");
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case "GetNumberOfSocios":
            session_start();
            $query = $db->prepare("SELECT COUNT(id) as Count FROM users");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);

            foreach ($rs as $r) {
                echo $r->Count;
            }
            break;
        case "GetNumberOfAniversariantes":
            session_start();
            $query = $db->prepare("SELECT COUNT(id) as Count FROM users WHERE DataDeNascimento = '" .  date("Y-m-d") . "' ");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);

            foreach ($rs as $r) {
                echo $r->Count;
            }
            break;
        case "GetUnpaidQuotas":
            session_start();
            $query = $db->prepare("SELECT COUNT(id) as Count FROM users WHERE DataDeQuotas < '" .  date("Y-m-d") . "' ");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);

            foreach ($rs as $r) {
                echo $r->Count;
            }
            break;
        case "GetProgrammedEvents":
            session_start();
            $query = $db->prepare("SELECT COUNT(id) as Count FROM events WHERE DataDeEvento >= '" .  date("Y-m-d") . "' ");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);

            foreach ($rs as $r) {
                echo $r->Count;
            }
            break;
    }
}
