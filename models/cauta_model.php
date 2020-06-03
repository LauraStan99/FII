<?php

class Cauta_model extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function searchByWord($word){
        return $this->db->selectSearch6('produse',$word, 'nume', 'material', 'descriere', 'tip', 'culoare', 'categorie');
    }
}

?>