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

    public function deleteAll($table_name){
        $string = "DELETE FROM " . $table_name;
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

    public function delete3($table_name, $col1, $data1, $col2, $data2, $col3, $data3)
    {
        $string = "DELETE FROM " . $table_name . " WHERE " . $col1 . "='" . $data1 . "' and ". $col2 . "='" . $data2 . "' and ".$col3 . "='".$data3."'";
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

    public function update3($table_name, $col1, $data1, $col2, $data2, $col3, $data3, $col4, $data4, $col5, $data5)
    {
        $string = "UPDATE ".$table_name." SET ".$col1." ='".$data1."' , ".$col2." ='".$data2."' WHERE ".$col3 ."='".$data3."' AND ".$col4."='".$data4."' AND ".$col5."='".$data5."'";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return true;
        else return false;
    }

    public function update2($table_name, $col1, $data1, $col2, $data2, $col3, $data3)
    {
        $string = "UPDATE ".$table_name." SET ".$col1." ='".$data1."' WHERE ".$col2 ."='".$data2."' AND ".$col3."='".$data3."'";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return true;
        else return false;
    }

    public function updateSetNew($table_name, $col1, $data1, $col2, $data2, $col3, $data3){
        $string = "UPDATE ".$table_name." SET ".$col1." =".$col1."-".$data1." WHERE ".$col2 ."='".$data2."' AND ".$col3."='".$data3."'";
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

    public function selectJoinLimit($table_name1, $table_name2, $col1, $col2, $col3, $data){
        $string = "SELECT * FROM " . $table_name1 . " JOIN ".$table_name2." ON ".$table_name1.".".$col1."=".$table_name2.".".$col2." WHERE ".$table_name1.".".$col3."='".$data."' LIMIT 5";
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

    public function select6($table_name,$col1,$data1,$col2,$data2,$col3,$data3,$col4,$data4,$col5,$data5,$col6,$data6)
    {
        $string="SELECT * FROM  ".$table_name." WHERE ".$col1." = ".$data1." and ".$col2." = ".$data2." and ".$col3." = ".$data3." and ".$col4." = ".$data4." and ".$col5." = ".$data5." and ".$col6." between ".$data6;
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
   
    }

    public function selectJoin7($table_name1, $table_name2, $col, $col1, $data1, $col2, $data2, $col3, $data3, $col4, $data4, $col5, $data5,$col6,$data6,$col7,$data7) {
      
        $string="SELECT * FROM " . $table_name1 . " JOIN ". $table_name2 . " ON " .$table_name1.".".$col. " = " .$table_name2.".".$col." where ". $col1. " = ". $data1. " and ".$col2. " = ". $data2. " and ".$col3. " = ". $data3. " and ".$col4. " = ". $data4. " and ".$col5. " = ". $data5." and ".$col6. " = ". $data6." and ".$col7." between ".$data7; 
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
    public function selectOrderBy1Limit($table_name,$col1, $col2, $col3,$filter,$limit) {
      
        $string="SELECT ".$col1.",".$col2." FROM ".$table_name. " order by ".$col3." ".$filter." limit ".$limit;  
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }
    public function selectOrderByLimit($table_name,$col,$filter,$limit) {
      
        $string="SELECT * FROM ".$table_name. " order by ".$col." ".$filter." limit ".$limit;  
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function selectLimit($table_name, $start, $limit){
        $string="SELECT * FROM ".$table_name. " LIMIT ".$start.",".$limit;  
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }


    public function selectCount($table_name, $col, $data){
        $string="SELECT count(*) FROM ".$table_name." WHERE ".$col."='".$data."'";  
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function selectCountSimple($table_name){
        $string="SELECT count(*) FROM ".$table_name;  
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function selectGroupBy($table_name,$col)
    {
        $string="SELECT ".$col.",count(*) as number FROM ".$table_name." GROUP BY ".$col;  
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }
    public function selectJoinGroupByWhere($table_name1,$table_name2,$col,$col1,$col2,$data2)
    {
      $string = "SELECT ".$col.", count(*) as number FROM ". $table_name1." JOIN ".$table_name2." ON ".$table_name1.".".$col1." = ".$table_name2.".".$col1." WHERE ".$col2."='".$data2."' GROUP BY ".$col;
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

    public function selectJoin2($table_name1, $table_name2, $col1, $col2, $col3, $data1, $col4, $data2){
        $string = "SELECT * FROM " . $table_name1 . " JOIN ".$table_name2." ON ".$table_name1.".".$col1."=".$table_name2.".".$col2." WHERE ".$table_name1.".".$col3."='".$data1."' and ".$table_name1.".".$col4."='".$data2."'";
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function selectOrderBy($table_name, $order, $filter){
        $string="SELECT * FROM ".$table_name." order by ".$order." ".$filter;  
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function selectOrderBy1($table_name,$col1,$data1,$order,$filter) {
      
        $string="SELECT * FROM ".$table_name." WHERE ".$col1."='".$data1."' order by ".$order." ".$filter;  
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }

    public function selectDate(){
        $string="SELECT sysdate()";  
        $stmt = $this->con->prepare($string);
        if ($stmt->execute()) return $stmt;
        else return false;
    }
}