<?php
class Admin_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectAllProducts($start_from, $limit)
    {
        return $this->db->selectLimit('produse', $start_from, $limit);
    }

    public function selectCountProducts(){
        $result = $this->db->selectCountSimple('produse');
        $row = $result->fetch();
        return $row['count(*)'];
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
    public function selectStatisticaProdusePopulare()
    {
        return $this->db->selectOrderBy1Limit('produse','nume','nr_accesari','nr_accesari','desc',10);
    }

    public function selectStatisticaPlataComenzi(){
        return $this->db->selectGroupBy('comanda','metoda_plata');
    }

    public function selectStatisticaComenziEuropa(){
        return $this->db->selectGroupBy('comanda','tara');
    }

    public function createCsvStatisticaComenzi()
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('DATA PLASARE', 'NUMAR PRODUSE'));
        $result=$this->selectStatisticaComenzi();
        while ($row =$result->fetch(PDO::FETCH_ASSOC)) {
            fputcsv($output, $row);
        }
        fclose($output);
    }

    public function createCsvStatisticaComenziEuropa(){
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('TARA', 'NUMAR COMENZI LIVRATE'));
        $result=$this->selectStatisticaComenziEuropa();
        while ($row =$result->fetch(PDO::FETCH_ASSOC)) {
            fputcsv($output, $row);
        }
        fclose($output);
    }

    public function createCsvStatisticaPlataComenzi(){
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('MODALITATE PLATA', 'NUMAR COMENZI'));
        $result=$this->selectStatisticaPlataComenzi();
        while ($row =$result->fetch(PDO::FETCH_ASSOC)) {
            fputcsv($output, $row);
        }
        fclose($output);
    }

    public function createCsvStatisticaProduseFemei(){
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('CATEGORIE PRODUSE FEMEI', 'NUMAR ARTICOLE CUMPARATE'));
        $result=$this->selectStatisticaProduseFemei();
        while ($row =$result->fetch(PDO::FETCH_ASSOC)) {
            fputcsv($output, $row);
        }
        fclose($output);
    }
    
    public function createCsvStatisticaCeleMaiPopulareProduse(){
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('DENUMIRE PRODUS', 'POPULARITATE'));
        $result=$this->selectStatisticaProdusePopulare();
        while ($row =$result->fetch(PDO::FETCH_ASSOC)) {
            fputcsv($output, $row);
        }
        fclose($output);
    }
}
