<?php 

class Database
{
   private $con;
 
   public function __construct(){
   
       $this->con = new mysqli('localhost:3308', 'dba', 'sql', 'impressed');
       if(!$this->con) echo 'Eroare la conexiunea cu baza de date';
   }
 
   public function insert($table_name, $data)  
   { 
        $string = "INSERT INTO ".$table_name." (";            
        $string .= implode(",", array_keys($data)) . ') VALUES (';            
        $string .= "'" . implode("','", array_values($data)) . "')";  
        if(mysqli_query($this->con, $string))   return true;
        else  return false;
   }

   public function delete($table_name, $col, $data){

      $string ="DELETE FROM ".$table_name." WHERE ".$col."='".$data."'";
      if(mysqli_query($this->con, $string)) return true;
      else  return false;
   }

   public function update($table_name, $col, $data, $id){
      $string = "UPDATE ".$table_name." SET ".$col." = '".$data."' WHERE id = ".$id;
      if(mysqli_query($this->con, $string)) return true;
      else  return false;
   }
}
