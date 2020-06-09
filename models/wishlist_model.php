<?php
class Wishlist_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
/**
 * se porneste sesiunea pentru a putea prelua id-ul utilizatorului conectat la aplicatie,
 * functia returneaza toate datele despre produsele din tabela de wishlist a  utilizatorului 
 */
    public function selectWishlistProducts()
    {
        if (!isset($_SESSION))
        {
            session_start();
        }
        $id = Session::get('id_utilizator');
        return $this->db->selectJoin('wishlist', 'produse', 'id_produs', 'id_produs', 'id_utilizator', $id);
    }
}
?>