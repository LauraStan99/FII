<?php
class Produse_model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function selectWomanCategory($category, &$count)
    {
        $result = $this->db->select2('produse','gen','femei','categorie',$category);
        $count = 0;
        while($result->fetch()){
            $count = $count + 1;
        }
        return $this->db->select2('produse','gen','femei','categorie',$category);
    }

    public function selectManCategory($category, &$count)
    {
        $result = $this->db->select2('produse','gen','barbati','categorie',$category);
        $count = 0;
        while($result->fetch()){
            $count = $count + 1;
        }
        return $this->db->select2('produse','gen','barbati','categorie',$category);
    }

    public function selectChildrenCategory($category, &$count)
    {
        $result = $this->db->select2('produse','gen','copii','categorie',$category);
        $count = 0;
        while($result->fetch()){
            $count = $count + 1;
        }
        return $this->db->select2('produse','gen','copii','categorie',$category);
    }

    public function selectOrder($gender,$category,$order,$filter, $resultPage, &$count) {


        while($row = $resultPage -> fetch()){
            $insert_data = array(
                'id_produs' => $row['id_produs'], 'nume' => $row['nume'], 'pret' => $row['pret'], 'material' => $row['material'], 'imagine'=>$row['imagine'], 'descriere' => $row['descriere'],
                'gen' => $row['gen'], 'tip' => $row['tip'], 'categorie' => $row['categorie'], 'culoare' => $row['culoare'], 'nr_accesari' => $row['nr_accesari']
            );
            $this->db->insert('produse_filter_order', $insert_data);
        }

        $result = $this->db->selectOrderBy2('produse_filter_order','gen',$gender,'categorie',$category,$order,$filter);
        $count = 0;
        while($result->fetch()){
            $count = $count + 1;
        }
        return $this->db->selectOrderBy2('produse_filter_order','gen',$gender,'categorie',$category,$order,$filter);
    }

    public function selectProduct($id_product){
        return $this->db->select1('produse', 'id_produs',$id_product);
    }

    public function selectCountProduct($id_product,$size){
        $result = $this->db->select2('marimi', 'id_produs', $id_product, 'marime', $size);
        $row = $result->fetch();
        return $row['cantitate'];
    }

    public function selectByFilter($category,$material,$marime,$tip,$gen,$culoare,$pret, &$count)
    {
        $result = $this->db->selectJoin7('produse','marimi','id_produs','categorie',$category,'material',$material,'marime',$marime,'tip',$tip,'gen',$gen,'culoare',$culoare,'pret',$pret);
        $count = 0;
        while($result->fetch()){
            $count = $count + 1;
        }
        return $this->db->selectJoin7('produse','marimi','id_produs','categorie',$category,'material',$material,'marime',$marime,'tip',$tip,'gen',$gen,'culoare',$culoare,'pret',$pret);
    }

    public function selectByFilterWithoutSize($category,$material,$tip,$gen,$culoare,$pret, &$count){
        $result = $this->db->select6('produse','categorie',$category,'material',$material,'tip',$tip,'gen',$gen,'culoare',$culoare,'pret',$pret);
        $count = 0;
        while($result->fetch()){
            $count = $count + 1;
        }
        return $this->db->select6('produse','categorie',$category,'material',$material,'tip',$tip,'gen',$gen,'culoare',$culoare,'pret',$pret);
    }

    public function deteleProduct($id_product)
    {
      return $this->db->delete1('produse','id_produs',$id_product);
    }

    public function deleteFromProduse_filter_order(){
        return $this->db->deleteAll('produse_filter_order');
    }

    public function nrAccesariCurente($id_product)
    {
        $result =$this->db->select1('produse','id_produs',$id_product);
        $row = $result->fetch();
        return $row['nr_accesari'];
    }

    public function cresteNrAccesari($nr_accesari,$id_product)
    {
        return $this->db->update('produse','nr_accesari',$nr_accesari,'id_produs',$id_product);
    }

}
