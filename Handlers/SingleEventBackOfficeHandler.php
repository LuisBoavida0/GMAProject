<?php
include("../PHP/Config.php");
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case "GetSingleEvents":
            session_start();
            $query = $db->prepare("SELECT events.Titulo, events.Descricao, events.DataDeEvento, events.publico, eventsfiles.ficheiro, eventsfiles.id FROM events, eventsfiles WHERE events.id = eventsfiles.idEvent AND events.id = " . $_REQUEST["id"]);
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($rs);
            break;
        case "EditEvent":
            session_start();
            $query = $db->prepare("UPDATE events SET Titulo = '" . $_REQUEST["Titulo"] . "', Descricao = '" . $_REQUEST["Descricao"] . "', DataDeEvento = '" . $_REQUEST["EventDate"] . "', publico = " . $_REQUEST["Publico"] . " WHERE id = " . $_REQUEST["id"]);
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($rs);
            break;
        case "DeleteImgFromEvent":
            DeleteImg($_REQUEST["file"]);
            DeleteImgDb($_REQUEST["id"]);
            break;
        case "AddImgs":
            for ($i = 0; $i < count($_FILES['InputFile']['name']); $i++) {
                $info = pathinfo($_FILES['InputFile']['name'][$i]);
                $ext = $info['extension']; // get the extension of the file
                $newname = GetNumberName() . "." . $ext;

                $target = '../Files/FilesSended/' . $newname;
                move_uploaded_file($_FILES['InputFile']['tmp_name'][$i], $target);

                InsertFileContent($_REQUEST["Id"], $newname);
            }
            header("Location: {$_SERVER['HTTP_REFERER']}");
            break;
        case "DeleteEvent":           
            $query = $db->prepare("SELECT id, ficheiro FROM eventsfiles WHERE idEvent = '" . $_REQUEST["id"] . "'");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            foreach ($rs as $r) {               
                DeleteImg($r->ficheiro);     
                DeleteImgDb($r->id);           
            }

            DeleteEventDb($_REQUEST["id"]);
            break;
    }
}

function DeleteImg($file)
{
    unlink("../Files/FilesSended/" . $file);
}

function DeleteImgDb($id)
{
    include("../PHP/Config.php");

    $query = $db->prepare("DELETE FROM eventsfiles WHERE id = " . $id);
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

function InsertFileContent($contentId, $fileName)
{
    include("../PHP/Config.php");
    $query = $db->prepare("INSERT INTO eventsfiles(idEvent, ficheiro) VALUES ('" . $contentId . "','" . $fileName . "')");
    $query->execute();
}

function DeleteEventDb($id)
{
    include("../PHP/Config.php");

    $query = $db->prepare("DELETE FROM events WHERE id = " . $id);
    $query->execute();
}
