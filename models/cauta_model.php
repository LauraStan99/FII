<?php

class Cauta_model extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function searchByWord($word){
        $this->deleteFromProduse_filter_order();
        $result =  $this->db->selectSearch6('produse',$word, 'nume', 'material', 'descriere', 'tip', 'culoare', 'categorie');
        while($row = $result->fetch()){
            $insert_data = array(
                'id_produs' => $row['id_produs'], 'nume' => $row['nume'], 'pret' => $row['pret'], 'material' => $row['material'], 'imagine'=>$row['imagine'], 'descriere' => $row['descriere'],
                'gen' => $row['gen'], 'tip' => $row['tip'], 'categorie' => $row['categorie'], 'culoare' => $row['culoare'], 'nr_accesari' => $row['nr_accesari']
            );
            $this->db->insert('produse_filter_order', $insert_data);
        }
        return $this->db->selectSearch6('produse',$word, 'nume', 'material', 'descriere', 'tip', 'culoare', 'categorie');
    }

    public function countSearch($word){
        $result = $this->db->selectSearch6('produse',$word, 'nume', 'material', 'descriere', 'tip', 'culoare', 'categorie');
        $i = 0;

        while($result->fetch()){
            $i=$i+1;
        }
        return $i;
    }
    public function sortare($filter,$order)
    {
        return $this->db->selectOrderBy('produse_filter_order',$filter,$order);
    }

    public function deleteFromProduse_filter_order()
    {
        return $this->db->deleteAll('produse_filter_order');
    }
}
