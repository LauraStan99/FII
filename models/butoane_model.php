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
                'id_utilizator' => $id,'id_produs' => $id_product, 'cantitate' => 1, 'pretTotal' => $row['pret'],
                'marime'=>$size, 'pret'=>$row['pret']
                
            );
            return $this->db->insert('cos', $insert_data);
        }

        public function selectProductDetails($id_product){
            return $this->db->select1('produse', 'id_produs', $id_product);
        }

        public function deleteFromCart($id_product,$size){
            if (!isset($_SESSION))
            {
                session_start();
            }
            $id = Session::get('id_utilizator');
            return $this->db->delete3('cos', 'id_utilizator', $id, 'id_produs', $id_product,'marime', $size);
        }

        public function countProductsCart(){
            if (!isset($_SESSION))
            {
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->select_count('cos', 'id_utilizator', $id);
            $row = $result->fetch();
            return $row['count(*)'];
        }

        public function selectProductCart($id_product, $size){
            if (!isset($_SESSION))
            {
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->selectCount3('cos', 'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
            $row = $result->fetch();
            return $row['count(*)'];
        }

        public function addQuantity($id_product, $size){
            if (!isset($_SESSION))
            {
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->select3('cos', 'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
            $row = $result->fetch();
            $newQuantity = $row['cantitate']+1;
            $newPrice = $newQuantity*$row['pret'];
            return $this->db->update3('cos', 'cantitate', $newQuantity, 'pretTotal', $newPrice,'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
        }

        public function subtractQuantity($id_product, $size){
            if (!isset($_SESSION))
            {
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->select3('cos', 'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
            $row = $result->fetch();
            $newQuantity = $row['cantitate']-1;
            $newPrice = $newQuantity*$row['pret'];
            return $this->db->update3('cos', 'cantitate', $newQuantity, 'pretTotal', $newPrice,'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
        }

        public function getQuantity($id_product, $size){
            if (!isset($_SESSION))
            {
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->select3('cos', 'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
            $row = $result->fetch();
            return $row['cantitate'];
        }
        

    }
?>