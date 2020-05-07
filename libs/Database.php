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

    public function delete($table_name, $col, $data)
    {

        $string = "DELETE FROM " . $table_name . " WHERE " . $col . "='" . $data . "'";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return true;
        else return false;
    }

    public function update($table_name, $col, $data, $id)
    {
        $string = "UPDATE " . $table_name . " SET " . $col . " ='" . $data . "' WHERE id_utilizator =" . $id;
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return true;
        else return false;
    }

    public function select($table_name,$gender,$category) {
      
        $string="SELECT * FROM ".$table_name." WHERE gen='".$gender."' and categorie='".$category."'";  
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function selectOrderBy($table_name,$gender,$category,$order,$filter) {
      
        $string="SELECT * FROM ".$table_name." WHERE gen='".$gender."' and categorie='".$category."' order by ".$order." ".$filter;  
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }
}
