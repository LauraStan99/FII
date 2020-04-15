<?php
include '../model/comenzi-model.php'; 
class InsertDate extends Database{

    function insertDate($table_name, $data)
    {
        return $this->insert($table_name, $data);
    }
}
?>