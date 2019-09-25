<?php
include("../PHP/Config.php");
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case "Login":
            session_start();
            $query = $db->prepare("select * from users where Email = '" . $_REQUEST["Email"] . "' AND Password = '" . hash("sha512", htmlspecialchars($_REQUEST["Password"])) . "'");
			$query->execute();
			$rs = $query->fetchAll(PDO::FETCH_OBJ);

            $ID = "false";
			foreach( $rs as $r ){
                $_SESSION["id"] = $r->id;
                $_SESSION["UserType"] = $r->UserType;

                if($r->UserType == 1)				
                    $ID = "Admin";
                else if ($r->UserType == 0)
                    $ID = "Socio";
			}
			echo $ID;
            break;
    }
}