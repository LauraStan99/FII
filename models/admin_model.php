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
    
}
