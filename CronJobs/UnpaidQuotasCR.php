<?php
include("../PHP/Config.php");
//GetUnpaid
$query = $db->prepare("SELECT id, Nome, Sexo, Idade, DataDeInscricao, DataDeQuotas, Email, UserType FROM users WHERE DataDeQuotas < CURRENT_DATE AND QuotasPayGiven = 0");
$query->execute();
$rs = $query->fetchAll(PDO::FETCH_OBJ);
echo "<p>" . json_encode($rs) . "</p>";

//UpdateTable
$query2 = $db->prepare("UPDATE users SET QuotasPayGiven = 1 WHERE QuotasPayGiven = 0 AND DataDeQuotas < CURRENT_DATE");
$query2->execute();  
?>

<html>

<head>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <script>
        var ParsedResponse = JSON.parse($("p").html());
        if (ParsedResponse.length > 0) {
            Email.send({
                Host: "smtp.gmail.com",
                Port: "587",
                EnableSsl: true,
                Username: "lampdsender@gmail.com",
                Password: "lampd2019Team",
                To: 'luis.128.b@gmail.com',
                From: "GMA@gmail.com",
                Subject: "Quotas não pagas",
                Body: "Existem " + ParsedResponse.length + " socios que não pagaram as quotas, por favor abra a aplicação no telemovel"
            }).then(
                message => alert(message)
            );
        }        
    </script>
</body>

</html>