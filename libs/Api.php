<?php
header("Content-Type:application/json");
if (isset($_GET['gen']) && $_GET['gen']!="") {
$con = new PDO('mysql:host=localhost:3308;dbname=impressed', 'dba', 'sql');
 $gen = $_GET['gen'];
 $result = $con->prepare("SELECT * FROM `produse` WHERE gen='".$gen."'");
 if($result->execute()){
 $results = $result->fetchAll();

 $return = [];
 foreach ($results as $row) {
     $return[] = [ 
         'nume' => $row['nume'],
         'imagine' => $row['imagine'],
         'pret' => $row['pret'],
         'descriere' => $row['descriere']
     ];}

echo json_encode($return);
 }else{
 response(NULL, NULL, 200,"No Record Found");
 }
}else{
 response(NULL, NULL, 400,"Invalid Request");
 }
 
function response($nume,$imagine,$pret, $descriere){
 $response['nume'] = $nume;
 $response['imagine'] = $imagine;
 $response['pret'] = $pret;
 $response['descriere']=$descriere;
 
 $json_response = json_encode(array($response), true);
 echo $json_response;
}
?>