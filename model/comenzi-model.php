<?php 

class Database
{
   public $con;
 
   public function __construct(){
   
       $this->con = new mysqli('localhost:3306', 'dba', 'sql', 'impressed');
       if(!$this->con)
       {
          echo 'eroare la baza de date';
       }
       
   }
 
   public function insert($table_name, $data)  
   { 
        $string = "INSERT INTO ".$table_name." (";            
        $string .= implode(",", array_keys($data)) . ') VALUES (';            
        $string .= "'" . implode("','", array_values($data)) . "')";  
        if(mysqli_query($this->con, $string))  
        {  
             return true;
        }  
        else  return false;
   }
}  
?>


