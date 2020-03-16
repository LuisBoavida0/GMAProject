<?php
include("../../PHP/Config.php");
$query = $db->prepare("SELECT id, Nome, Sexo, Idade, DataDeInscricao, DataDeQuotas, Email, UserType, QuotasPayGiven, PhoneNumber FROM users WHERE DataDeQuotas < CURRENT_DATE AND QuotasPayGiven = 1");
$query->execute();
$rs = $query->fetchAll(PDO::FETCH_OBJ);
echo json_encode($rs);

$query2 = $db->prepare("UPDATE users SET QuotasPayGiven = 2 WHERE QuotasPayGiven = 1;");
$query2->execute();
$rs2 = $query2->fetchAll(PDO::FETCH_OBJ);
?>
