<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php

$q = $_GET['q'];

$con = new PDO('mysql:host=localhost:3308;dbname=impressed', 'dba', 'sql');



$sql="SELECT * FROM produse WHERE tip IN (".implode(',', $q).")";


$result = $con->prepare($sql);
$result->execute();

echo "<table>
<tr>
<th>id_produs</th>
<th>nume</th>
<th>material</th>
<th>culoare</th>
<th>tip</th>
</tr>";
while($row = $result->fetch()){
  echo "<tr>";
  echo "<td>" . $row['id_produs'] . "</td>";
  echo "<td>" . $row['nume'] . "</td>";
  echo "<td>" . $row['material'] . "</td>";
  echo "<td>" . $row['culoare'] . "</td>";
  echo "<td>" . $row['tip'] . "</td>";
  echo "</tr>";
}
echo "</table>";
?>
</body>
</html>