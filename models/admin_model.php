<?php
class Admin_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectAllProducts()
    {
        return $this->db->selectOrderBy('produse', 'id_produs', 'asc');
    }
    public function deleteProduct($id_product)
    {
        return $this->db->delete1('produse', 'id_produs', $id_product);
    }
    public function selectAllUsers()
    {
        return $this->db->selectOrderBy('utilizatori', 'id_utilizator', 'asc');
    }
    public function deleteUser($id_user)
    {
        return $this->db->delete1('utilizatori', 'id_utilizator', $id_user);
    }
    public function insertNewProduct($data)
    {
        return $this->db->insert('produse', $data);
    }
    public function selectProductById($id)
    {  $result= $this->db->select1('produse','id_produs',$id);
       $count = $this->db->selectCount('produse','id_produs',$id);
       $row=$count->fetch();
       if($row['count(*)']==0) return false;
       else return $result;
    }
    
    public function updateProductName($name,$id)
    {
        return $this->db->update('produse', 'nume', $name, 'id_produs',$id);
    }

    public function updateProductPrice($price,$id)
    {
        return $this->db->update('produse', 'pret', $price, 'id_produs',$id);
    }
    public function updateProductMaterial($material,$id)
    {
        return $this->db->update('produse', 'material', $material, 'id_produs',$id);
    }
    public function updateProductImage($image,$id)
    {
        return $this->db->update('produse', 'imagine', $image, 'id_produs',$id);
    }
    public function updateProductDescription($description,$id)
    {
        return $this->db->update('produse', 'descriere', $description, 'id_produs',$id);
    }
    public function updateProductGender($gender,$id)
    {
        return $this->db->update('produse', 'gen', $gender, 'id_produs',$id);
    }
    public function updateProductTipe($tipe,$id)
    {
        return $this->db->update('produse', 'tip', $tipe, 'id_produs',$id);
    }
    public function updateProductCategory($category,$id)
    {
        return $this->db->update('produse', 'categorie', $category, 'id_produs',$id);
    }
    public function updateProductColor($color,$id)
    {
        return $this->db->update('produse', 'culoare', $color, 'id_produs',$id);
    }
    public function selectStatisticaComenzi()
    {
        return $this->db->selectGroupBy('comanda','data_plasare');
    } 
    public function selectStatisticaProduseFemei()
    {
        return $this->db->selectJoinGroupByWhere('produse_comanda','produse','categorie','id_produs','gen','femei');
    }

    public function selectStatisticaPlataComenzi(){
        return $this->db->selectGroupBy('comanda','metoda_plata');
    }
    
}
