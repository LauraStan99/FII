<?php
include '../model/comenzi-model.php';
class Insert extends Database{

    function insertDate($table_name, $data)
    {
        return $this->insert($table_name, $data);
    }
}
?>