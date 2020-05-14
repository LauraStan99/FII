<?php

class Database extends PDO
{
    public  $con;

    public function __construct()
    {
        $this->con = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
        if (!$this->con) {
            echo 'Eroare la conexiunea cu baza de date';
            die();
        }
    }

    public function insert($table_name, $data)
    {
        $string = "INSERT INTO " . $table_name . " (";
        $string .= implode(",", array_keys($data)) . ') VALUES (';
        $string .= "'" . implode("','", array_values($data)) . "')";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return true;
        else return false;
    }

    public function delete1($table_name, $col, $data)
    {

        $string = "DELETE FROM " . $table_name . " WHERE " . $col . "='" . $data . "'";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return true;
        else return false;
    }

    public function delete2($table_name, $col1, $data1, $col2, $data2)
    {
        $string = "DELETE FROM " . $table_name . " WHERE " . $col1 . "='" . $data1 . "' and ". $col2 . "='" . $data2 . "'";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return true;
        else return false;
    }

    public function update($table_name, $col1, $data1, $col2, $data2)
    {
        $string = "UPDATE ".$table_name." SET ".$col1." ='".$data1."' WHERE ".$col2 ."='".$data2."'";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return true;
        else return false;
    }

    public function select2($table_name,$col1,$data1,$col2,$data2) {
      
        $string="SELECT * FROM ".$table_name." WHERE ".$col1."='".$data1."' and ".$col2."='".$data2."'";  
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function selectOrderBy2($table_name,$col1,$data1,$col2,$data2,$order,$filter) {
      
        $string="SELECT * FROM ".$table_name." WHERE ".$col1."='".$data1."' and ".$col2."='".$data2."' order by ".$order." ".$filter;  
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function select1($table_name, $col, $data){
        $string="SELECT * FROM ".$table_name." WHERE ".$col."='".$data."'";  
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function select_count($table_name, $col, $data){
        $string="SELECT count(*) FROM ".$table_name." WHERE ".$col."='".$data."'";  
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function selectByArray($table_name, $col, $data){
        $string = "SELECT * FROM " . $table_name . " WHERE ".$col." IN";
        $string .= "(" . implode(",", array_values($data)) . ")";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }
}