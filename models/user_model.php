<?php

class User_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * functie ce insereaza toate datele preluate din formularul de register cu privire la un nou utilizator in tabela utilizatori
     */
    public function addUser($data)
    {
        return $this->db->insert('utilizatori', $data);
    }

  /**
     * functia face o actualizare numelui utilizatrului al carui id este preluat din sesiune ,
     * astfel noul nume hotarat de utilizator este adaugat in baza de date 
     */
    public function updateLastName($name)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $id = Session::get('id_utilizator');
        return $this->db->update('utilizatori', 'nume', $name, 'id_utilizator', $id);
    }

    /**
     * functia face o actualizare prenumelui utilizatrului al carui id este preluat din sesiune ,
     * astfel noul prenume hotarat de utilizator este adaugat in baza de date 
     */
    public function updateFirstName($prenume)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $id = Session::get('id_utilizator');
        return $this->db->update('utilizatori', 'prenume', $prenume, 'id_utilizator', $id);
    }


    /**
     * functia face o actualizare asupra adresei de email utilizatrului, al carui id este preluat din sesiune ,
     * astfel noua adresa de email  hotarata de utilizator este adaugata in baza de date 
     */
    public function updateEmail($email)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $id = Session::get('id_utilizator');
        return $this->db->update('utilizatori', 'email', $email, 'id_utilizator', $id);
    }

    /**
     * functia face o actualizare asupra numarului de telefon al utilizatrului, al carui id este preluat din sesiune ,
     * astfel noul numar hotarat de utilizator este adaugat in baza de date 
     */
    public function updatePhone($phone)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $id = Session::get('id_utilizator');
        return $this->db->update('utilizatori', 'telefon', $phone, 'id_utilizator', $id);
    }

    /**
     * functia face o actualizare asupra adresei utilizatrului ,al carui id este preluat din sesiune ,
     * astfel noua adresa hotarata de utilizator este adaugata in baza de date 
     */
    public function updateAddress($address)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $id = Session::get('id_utilizator');
        return $this->db->update('utilizatori', 'adresa', $address, 'id_utilizator', $id);
    }

    /**
     * functia face un update in baza de date pentru utilizatorulpreluat din sesiunea existenta in aplicatie(cand user-ul doreste sa isi schimbe parola)
     * noua parola este codificata folosind algoritmul sha256 ,mai apoi introdus in baza de date
     */
    public function updatePassword($password)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $id = Session::get('id_utilizator');
        return $this->db->update('utilizatori', 'parola', HASH::create('sha256', $password, HASH_PASSWORD_KEY), 'id_utilizator', $id);
    }

    /**
     * se porneste sesiunea pentru a putea prelua id-ul utilizatorului logat la aplicatie ,
     * odata aflat functia returneaza toate comenzile efectuate de catre utilizatorului cu id-ul specificat
     */
    public function selectComenziUtilizator()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $id = Session::get('id_utilizator');
        return $this->db->select1('comanda', 'id_utilizator', $id);
    }

    /**
     * functia returneaza toate datele despre produsele comenzii cu id-ul specificat 
     */
    public function selectDetaliiComanda($orderId)
    {
        return $this->db->selectJoin('produse_comanda', 'produse', 'id_produs', 'id_produs', 'id_comanda', $orderId);
    }
    /**
     * in functie de id-ul comenzii se apeleaza functia de returnare a produselor din comanda cu id-ul specificat , 
     * raspunsul primit se parcurge si pentru fiecare produs in parte se preia pretul si se adauga la un pret total,
     * la final se returneaza pretul total al comenzii
     */
    public function selectTotalPrice($orderId)
    {
        $result = $this->selectDetaliiComanda($orderId);
        $totalPrice = 0;
        while ($row = $result->fetch()) {
            $totalPrice = $totalPrice + $row['cantitate'] * $row['pret'];
        }
        return $totalPrice;
    }
}
