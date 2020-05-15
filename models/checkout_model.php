<?php
class Checkout_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function deleteCommand($id_command){
        if (!isset($_SESSION))
        {
            session_start();
        }
        $id = Session::get('id_utilizator');
        return $this->db->delete2('produse_comanda', 'id_utilizator', $id, 'id_comanda', $id_command);
    }

    public function addNewCommand($id_comanda, $nume, $prenume, $email, $adresa, $oras, $tara, $plata, $livrare){
        if (!isset($_SESSION))
        {
            session_start();
        }
        $id = Session::get('id_utilizator');
        if($plata == "cash")
        {
            $status_comanda = "inregistrata";
        }
        else if($plata == "card")
        {
            $status_comanda = "in asteptare plata";
        }

        $result = $this->db->selectDate();
        $row = $result->fetch();
        $data_plasare = $row['sysdate()'];

        $insert_data = array(
            'id_utilizator' => $id, 'nume' => $nume, 'prenume' => $prenume, 'email' => $email,
            'adresa' => $adresa, 'oras' => $oras, 'tara' => $tara, 'metoda_plata' => $plata, 'metoda_livrare' => $livrare,
            'status_comanda' => $status_comanda, 'data_plasare' => $data_plasare, 'id_comanda' => $id_comanda
        );
        return $this->db->insert('comanda', $insert_data);
    }

    public function deleteCart(){
        if (!isset($_SESSION))
        {
            session_start();
        }
        $id = Session::get('id_utilizator');

        return $this->db->delete1('cos', 'id_utilizator', $id);
    }
}
