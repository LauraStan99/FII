<?php
/*$con = new PDO('mysql:host=localhost:3308;dbname=impressed', 'dba', 'sql');
$string = "SELECT * FROM marimi";

$result = $con->prepare($string);
if($result->execute()){
    while($row = $result->fetch()){
        $string1 = "UPDATE marimi SET cantitate = 30 WHERE id_produs =".$row['id_produs'];
        $result1 = $con->prepare($string1);
        if($result1->execute()){
            echo 'OK';
        }
        else{
            echo 'EROARE';
        }
    }
}
else{
    echo 'EROARE';
}*/

/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/Exception.php";
require_once "PHPMailer/SMTP.php";

$mail = new PHPMailer();

$mail->isSMTP();
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "impressed.shop2020";
$mail->Password = "impressed2020$";
$mail->Port = 587;
$mail->SMTPSecure="tls";

$mail->isHTML(true);
$mail->setFrom("impressed@gmail.com");
$mail->addAddress("impressed.shop2020@gmail.com");
$mail->Subject = "Text";
$mail->Body = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";

if($mail->send()){
    echo "Email is sent!";
}
else echo "Error{$mail->ErrorInfo}";*/
?>