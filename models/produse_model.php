<?php
class Produse_model extends Model
{


    public function __construct()
    {
        parent::__construct();
    }

    public function selectWomanCategory($category)
    {
        return $this->db->select('produse', 'femei', $category);
    }

    public function selectManCategory($category)
    {
        return $this->db->select('produse', 'barbati', $category);
    }

    public function selectChildrenCategory($category)
    {
        return $this->db->select('produse', 'copii', $category);
    }
    public function selectOrder($gender,$category,$order,$filter) {
        return $this->db->selectOrderBy('produse',$gender,$category,$order,$filter);
    }

}
