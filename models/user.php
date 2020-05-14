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
        if (!isset($_SESSION))
		{
			session_start();
		}
        $id = Session::get('id_utilizator');
        return $this->db->update('utilizatori', 'nume', $name, 'id_utilizator',$id);
    }

    public function updatePrenume($prenume)
    {
        if (!isset($_SESSION))
		{
			session_start();
		}
        $id = Session::get('id_utilizator');
        return $this->db->update('utilizatori', 'prenume', $prenume, 'id_utilizator', $id);
    }

    public function updateEmail($email)
    {
        if (!isset($_SESSION))
		{
			session_start();
		}
        $id = Session::get('id_utilizator');
        return $this->db->update('utilizatori', 'email', $email, 'id_utilizator', $id);
    }

    public function updatePhone($phone){
        if (!isset($_SESSION))
		{
			session_start();
		}
        $id = Session::get('id_utilizator');
        return $this->db->update('utilizatori', 'telefon', $phone, 'id_utilizator', $id);
    }

    public function updateAddress($address){
        if (!isset($_SESSION))
		{
			session_start();
		}
        $id = Session::get('id_utilizator');
        return $this->db->update('utilizatori', 'adresa', $address, 'id_utilizator', $id);
    }

    public function updatePassword($password){
        if (!isset($_SESSION))
		{
			session_start();
		}
        $id = Session::get('id_utilizator');
        return $this->db->update('utilizatori', 'parola', HASH::create('sha256',$password, HASH_PASSWORD_KEY), 'id_utilizator', $id);
    }
}
