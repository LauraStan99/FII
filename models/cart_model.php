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
        $result = $this->db->select_list('cos', $id);
        $products = array();
        while($row = $result->fetch()){
            array_push($products, $row['id_produs']);
        }
        return $this->db->selectByArray('produse', $products);
    }
}
?>