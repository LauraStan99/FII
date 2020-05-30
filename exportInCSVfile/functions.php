<?php
    if (isset($_POST["Export"])) {

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('id_utilizator','nume', 'prenume', 'email', 'adresa', 'oras','tara','metoda_plata','metoda_livrare','status_comanda','data_plasare','id_comanda'));
        $con = new PDO('mysql:host=localhost:3308;dbname=impressed', 'dba', 'sql');

        $string = "select nume,prenume,email from comanda";
        $result = $con->prepare($string);
        $result->execute();
        while ($row = $result->fetch()) {
            fputcsv($output, $row);
        }
        
        fclose($output);
    }
