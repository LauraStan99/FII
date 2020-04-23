<?php

class User extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function addUser($data)
    {
        return $this->db->insert('utilizatori', $data);
    }
 /*   public function updateName($name)
    {
        return $this->db->update('utilizatori',$name,'nume',$id);
    }*/
}
