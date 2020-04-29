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
    public function updateName($name)
    {
        $id = Session::get('id_utilizator');
        return $this->db->update('utilizatori', 'nume', $name, $id);
    }
}
