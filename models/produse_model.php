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

    public function selectCountProduct($id_product,$size){
        $result = $this->db->select2('marimi', 'id_produs', $id_product, 'marime', $size);
        $row = $result->fetch();
        return $row['cantitate'];
    }
 public function selectByFilter($category,$material,$marime,$tip,$gen,$culoare,$pret)
 {
     return $this->db->selectJoin7('produse','marimi','id_produs','categorie',$category,'material',$material,'marime',$marime,'tip',$tip,'gen',$gen,'culoare',$culoare,'pret',$pret);
 }
    public function selectByFilterWithoutSize($category,$material,$tip,$gen,$culoare,$pret){
        return $this->db->select6('produse','categorie',$category,'material',$material,'tip',$tip,'gen',$gen,'culoare',$culoare,'pret',$pret);
    }

}
