<?php
include("../../PHP/Config.php");
$query = $db->prepare("SELECT id, Nome, Sexo, Email, PhoneNumber, BirthDayGiven FROM `users` WHERE DataDeNascimento = '" .  date("Y-m-d") . "' AND BirthDayGiven = 1");
$query->execute();
$rs = $query->fetchAll(PDO::FETCH_OBJ);
echo json_encode($rs);

$query2 = $db->prepare("UPDATE users SET BirthDayGiven = 2 WHERE BirthDayGiven = 1;");
$query2->execute();
$rs2 = $query2->fetchAll(PDO::FETCH_OBJ);
?>
