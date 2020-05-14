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
        return $result = $this->db->selectJoin('wishlist', 'produse', 'id_produs', 'id_produs', 'id_utilizator', $id);
    }
}
?>