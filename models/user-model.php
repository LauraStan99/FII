<?php

require 'connectionDB.php';

class User extends Database{

    function addUser($data){
        return $this->insert('utilizatori', $data);
    }

}

?>