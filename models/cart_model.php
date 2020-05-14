<?php
class Cart_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectCartProducts()
    {
        if (!isset($_SESSION))
        {
            session_start();
        }
        $id = Session::get('id_utilizator');
        return $result = $this->db->selectJoin('cos', 'produse', 'id_produs', 'id_produs', 'id_utilizator', $id);
    }

    public function selectCartTotalPrice(){
        if (!isset($_SESSION))
        {
            session_start();
        }
        $id = Session::get('id_utilizator');
        $result = $this->db->select1('cos', 'id_utilizator', $id);
        $total = 0;
        while($row = $result->fetch()){
            $total = $total + $row['pret']*$row['cantitate'];
        }
        return $total;
    }
}
?>