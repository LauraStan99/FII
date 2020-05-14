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
        $result = $this->db->select1('cos', 'id_utilizator',$id);
        $products = array();
        while($row = $result->fetch()){
            array_push($products, $row['id_produs']);
        }
        return $this->db->selectByArray('produse', 'id_produs', $products);
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