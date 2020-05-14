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

    public function update3($table_name, $col1, $data1, $col2, $data2, $col3, $data3, $col4, $data4)
    {
        $string = "UPDATE ".$table_name." SET ".$col1." ='".$data1."' WHERE ".$col2 ."='".$data2."' AND ".$col3."='".$data3."' AND ".$col4."='".$data4."'";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return true;
        else return false;
    }

    public function select1($table_name, $col, $data){
        $string="SELECT * FROM ".$table_name." WHERE ".$col."='".$data."'";  
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function select2($table_name,$col1,$data1,$col2,$data2) {
      
        $string="SELECT * FROM ".$table_name." WHERE ".$col1."='".$data1."' and ".$col2."='".$data2."'";  
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function selectCount3($table_name,$col1,$data1,$col2,$data2,$col3,$data3) {
      
        $string="SELECT count(*) FROM ".$table_name." WHERE ".$col1."='".$data1."' and ".$col2."='".$data2."' and ".$col3."='".$data3."'";  
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function select3($table_name,$col1,$data1,$col2,$data2,$col3,$data3) {
      
        $string="SELECT * FROM ".$table_name." WHERE ".$col1."='".$data1."' and ".$col2."='".$data2."' and ".$col3."='".$data3."'";  
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

    public function selectJoin($table_name1, $table_name2, $col1, $col2, $col3, $data){
        $string = "SELECT * FROM " . $table_name1 . " JOIN ".$table_name2." ON ".$table_name1.".".$col1."=".$table_name2.".".$col2." WHERE ".$table_name1.".".$col3."='".$data."'";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }
}