<?php
class Wishlist_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectWishlistProducts()
    {
        if (!isset($_SESSION))
        {
            session_start();
        }
        $id = Session::get('id_utilizator');
        $result = $this->db->select_list('wishlist', $id);
        while($row = $result->fetch()){
            $products = array(
                'id_produs' => $row['id_produs'],
            );
        }
        return $this->db->selectByArray('produse', $products);
        
    }
}
