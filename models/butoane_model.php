<?php

    class Butoane_model extends Model{
        
        public function __construct()
        {
            parent::__construct();
        }


        public function addToWishlist($id_product,$size){
            if (!isset($_SESSION))
            {
                session_start();
            }
            $id = Session::get('id_utilizator');
            $insert_data = array(
                'id_utilizator' => $id,'id_produs' => $id_product , 'marime'=>$size
            );
            return $this->db->insert('wishlist', $insert_data);
        }

        public function addToCart($id_product,$size){
            if (!isset($_SESSION))
            {
                session_start();
            }
            $result = $this->selectProductDetails($id_product);
            $row = $result->fetch();
            $id = Session::get('id_utilizator');
            $insert_data = array(
                'id_utilizator' => $id,'id_produs' => $id_product, 'cantitate' => 1, 'pret' => $row['pret'],
                'marime'=>$size
                
            );
            return $this->db->insert('cos', $insert_data);
        }

        public function selectProductDetails($id_product){
            return $this->db->selectOne('produse', $id_product);
        }
    }
?>