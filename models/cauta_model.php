<?php

class Cauta_model extends Model{

    public function __construct()
    {
        parent::__construct();
    }


    public function selectSearch($start_from, $limit){

        return $this->db->selectLimit('produse_filter_order', $start_from, $limit);
    }

    public function count(){
        $result = $this->db->selectCountSimple('produse_filter_order');
        $row = $result->fetch();
        return $row['count(*)'];
    }

    public function searchByWord($word, $start_from, $limit){
        $this->deleteFromProduse_filter_order();
        $result =  $this->db->selectSearch6('produse',$word, 'nume', 'material', 'descriere', 'tip', 'culoare', 'categorie');
        while($row = $result->fetch()){
            $insert_data = array(
                'id_produs' => $row['id_produs'], 'nume' => $row['nume'], 'pret' => $row['pret'], 'material' => $row['material'], 'imagine'=>$row['imagine'], 'descriere' => $row['descriere'],
                'gen' => $row['gen'], 'tip' => $row['tip'], 'categorie' => $row['categorie'], 'culoare' => $row['culoare'], 'nr_accesari' => $row['nr_accesari']
            );
            $this->db->insert('produse_filter_order', $insert_data);
        }
        return $this->db->selectSearch6Limit('produse',$word, 'nume', 'material', 'descriere', 'tip', 'culoare', 'categorie', $start_from, $limit);
    }

    public function countSearch($word){
        $result = $this->db->selectSearch6('produse',$word, 'nume', 'material', 'descriere', 'tip', 'culoare', 'categorie');
        $i = 0;

        while($result->fetch()){
            $i=$i+1;
        }
        return $i;
    }

    public function sortare($filter,$order, $start_from, $limit)
    { 
    
        $result=$this->db->selectOrderBy('produse_filter_order',$filter,$order);
        $this->deleteFromProduse_filter_order();
        while($row=$result->fetch())
        {
            $insert_data = array(
                'id_produs' => $row['id_produs'], 'nume' => $row['nume'], 'pret' => $row['pret'], 'material' => $row['material'], 'imagine'=>$row['imagine'], 'descriere' => $row['descriere'],
                'gen' => $row['gen'], 'tip' => $row['tip'], 'categorie' => $row['categorie'], 'culoare' => $row['culoare'], 'nr_accesari' => $row['nr_accesari']
            );
            $this->db->insert('produse_filter_order', $insert_data);
        }
        return $this->db->selectOrderByLimit2('produse_filter_order',$filter,$order,  $start_from, $limit);
    

    }

    public function deleteFromProduse_filter_order()
    {
        return $this->db->deleteAll('produse_filter_order');
    }
}
