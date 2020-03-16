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

        case "AddContent":
            $contentId = InsertContent();

            for ($i = 0; $i < count($_FILES['InputFile']['name']); $i++) {
                $info = pathinfo($_FILES['InputFile']['name'][$i]);
                $ext = $info['extension']; // get the extension of the file
                $newname = GetNumberName() . "." . $ext;

                $target = '../Files/FilesSended/' . $newname;
                move_uploaded_file($_FILES['InputFile']['tmp_name'][$i], $target);

                InsertFileContent($contentId, $newname);
            }
            header("Location: {$_SERVER['HTTP_REFERER']}");
            break;

        case "GetProgrammedEvents":
            session_start();
            $query = $db->prepare("SELECT events.id, events.Titulo, events.DataDeEvento, eventsfiles.ficheiro FROM events, eventsfiles WHERE events.id = eventsfiles.idEvent GROUP BY eventsfiles.idEvent ORDER BY events.DataDeEvento DESC");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($rs);
            break;
    }
}

function InsertContent()
{
    include("../PHP/Config.php");
    $IsPublicEvent = 0;
    if (isset($_REQUEST["PublicEvent"])) {
        $IsPublicEvent = 1;
    } else {
        $IsPublicEvent = 0;
    }

    $query = $db->prepare("INSERT INTO events (Titulo, Descricao, DataDeEvento, publico) VALUES ('" . htmlspecialchars($_REQUEST["Titulo"]) . "','" . htmlspecialchars($_REQUEST["Descricao"]) . "', '" . htmlspecialchars($_REQUEST["DataDeEvento"]) . "', '" . $IsPublicEvent . "');");
    $query->execute();

    $query = $db->prepare("SELECT LAST_INSERT_ID() AS id;");
    $query->execute();
    $rs = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($rs as $r) {
        return $r->id;
    }
}

function InsertFileContent($contentId, $fileName)
{
    include("../PHP/Config.php");
    $query = $db->prepare("INSERT INTO eventsfiles(idEvent, ficheiro) VALUES ('" . $contentId . "','" . $fileName . "')");
    $query->execute();
}

function GetNumberName()
{
    include("../PHP/Config.php");

    $query = $db->prepare("SELECT * FROM eventsfiles ORDER BY id DESC LIMIT 0, 1");
    $query->execute();
    $rs = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($rs as $r) {
        return $r->id + 1;
    }
}
