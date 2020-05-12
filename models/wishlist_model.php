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
        $i = 0;
        while($row = $result->fetch()){
            $products[$i] = $row['id_produs'];
            $i = $i + 1;
        }
        return $this->db->selectByArray('produse', $products);
        
    }
}
