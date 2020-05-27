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

    public function selectCartProducts($orderId){
        return $this->db->selectJoinLimit('produse_comanda', 'produse', 'id_produs', 'id_produs', 'id_comanda', $orderId);
    }

    public function selectSubtotal($orderId){
        $result = $this->db->select1('produse_comanda', 'id_comanda', $orderId);
        $subtotal = 0;
        while($row = $result->fetch()){
            $subtotal = $subtotal + $row['pret']*$row['cantitate'];
        }
        return $subtotal;
    }

    public function selectNrProd($orderId){
        $result = $this->db->selectCount('produse_comanda', 'id_comanda', $orderId);
        $row = $result -> fetch();
        return $row['count(*)'];
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
        $this->db->insert('comanda', $insert_data);

        $result1 = $this->db->select1('produse_comanda', 'id_comanda', $id_comanda);
        while($row1 = $result1->fetch()){
            $this->db->updateSetNew('marimi', 'cantitate', $row1['cantitate'], 'id_produs', $row1['id_produs'], 'marime', $row1['marime']);
        }
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
