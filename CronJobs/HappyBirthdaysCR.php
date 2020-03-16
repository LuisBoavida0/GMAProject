<?php
include("../PHP/Config.php");
$query = $db->prepare("SELECT id, Nome, Sexo, Email, PhoneNumber, BirthDayGiven FROM `users` WHERE DataDeNascimento = '" .  date("Y-m-d") . "' AND BirthDayGiven = 0");
$query->execute();
$rs = $query->fetchAll(PDO::FETCH_OBJ);
echo "<p>" . json_encode($rs) . "</p>";

//UpdateTable
$query2 = $db->prepare("UPDATE users SET BirthDayGiven = 1 WHERE BirthDayGiven = 0 AND DataDeNascimento = '" .  date("Y-m-d") . "'");
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
                Subject : "Aniversariantes",
                Body : "Existem " + ParsedResponse.length + " aniversariantes, por favor abra a aplicação no telemovel"
            }).then(
                message => alert(message)
            );
        }
    </script>
</body>

</html>