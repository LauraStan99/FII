<?php
class catalog_model extends Model
{


    public function __construct()
    {
        parent::__construct();
    }

    public function selectCategory($categorie)
    {
        return $this->db->select('produse', 'femei', $categorie);
    }
}
