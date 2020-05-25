<?php
class Produse_model extends Model
{


    public function __construct()
    {
        parent::__construct();
    }

    public function selectWomanCategory($category)
    {
        return $this->db->select2('produse','gen','femei','categorie',$category);
    }

    public function selectManCategory($category)
    {
        return $this->db->select2('produse','gen','barbati','categorie',$category);
    }

    public function selectChildrenCategory($category)
    {
        return $this->db->select2('produse','gen','copii','categorie',$category);
    }
    public function selectOrder($gender,$category,$order,$filter) {
        return $this->db->selectOrderBy2('produse','gen',$gender,'categorie',$category,$order,$filter);
    }

    public function selectProduct($id_product){
        return $this->db->select1('produse', 'id_produs',$id_product);
    }

    public function selectAllProducts(){
        return $this->db->selectOrderBy('produse','id_produs','asc');
    }

}
