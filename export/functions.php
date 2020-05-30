<?php 
   if(isset($_POST["Export"]))  
   {  
        $connect = mysqli_connect("localhost:3308", "dba", "sql", "impressed");  
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=data.csv');  
        $output = fopen("php://output", "w");  
        fputcsv($output, array('Nume', 'Adresa', 'Prenume'));  
        $query = "SELECT nume, adresa, prenume from comanda";  
        $result = mysqli_query($connect, $query);  
        while($row = mysqli_fetch_assoc($result))  
        {  
             fputcsv($output, $row);  
        }  
        fclose($output);  
   }  
   ?>  

