<?php
$con = new PDO('mysql:host=localhost:3308;dbname=impressed', 'dba', 'sql');

$array = $con->query("SELECT *
  FROM comanda")->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($array);








// $result = $con->prepare($string);
// if($result->execute()){
//     while($row = $result->fetch()){
//         $string1 = "UPDATE marimi SET cantitate = 30 WHERE id_produs =".$row['id_produs'];
//         $result1 = $con->prepare($string1);
//         if($result1->execute()){
//             echo 'OK';
//         }
//         else{
//             echo 'EROARE';
//         }
//     }
// }
// else{
//     echo 'EROARE';
// }
