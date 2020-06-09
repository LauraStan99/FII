<?php
class Produse_model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

     /**
     * functia preia toate produsele din tabela de "produse" din categoria femei si subcategoria specificata ca si parametru ($category)
     */
    public function selectWomanCategory($category, &$count)
    {
        $result = $this->db->select2('produse', 'gen', 'femei', 'categorie', $category);
        $count = 0;
        while ($result->fetch()) {
            $count = $count + 1;
        }
        return $this->db->select2('produse', 'gen', 'femei', 'categorie', $category);
    }

     /**
     * functia preia toate produsele din tabela de "produse" din categoria barbati si subcategoria specificata ca si parametru ($category)
     */
    public function selectManCategory($category, &$count)
    {
        $result = $this->db->select2('produse', 'gen', 'barbati', 'categorie', $category);
        $count = 0;
        while ($result->fetch()) {
            $count = $count + 1;
        }
        return $this->db->select2('produse', 'gen', 'barbati', 'categorie', $category);
    }

    /**
     * functia preia toate produsele din tabela de "produse" din categoria copii si subcategoria specificata ca si parametru ($category)
     */
    public function selectChildrenCategory($category, &$count)
    {
        $result = $this->db->select2('produse', 'gen', 'copii', 'categorie', $category);
        $count = 0;
        while ($result->fetch()) {
            $count = $count + 1;
        }
        return $this->db->select2('produse', 'gen', 'copii', 'categorie', $category);
    }

    /**
     * se sterg datele din tabela "produse_filter_order",
     * functia introduce datele in tabela "produse_filter_order" -fiind produsele dupa randarea paginii unei subcategorii
     * asupra datelor se aplica filtrarea dupa coloana specificata in parametrii functiei($order) si se realizeaza sortarea($filter)
     * dupa care se returneaza produsele ordonate 
     */
    public function selectOrder($gender, $category, $order, $filter, $resultPage, &$count)
    {

        $this->deleteFromProduse_filter_order();
        while ($row = $resultPage->fetch()) {
            $insert_data = array(
                'id_produs' => $row['id_produs'], 'nume' => $row['nume'], 'pret' => $row['pret'], 'material' => $row['material'], 'imagine' => $row['imagine'], 'descriere' => $row['descriere'],
                'gen' => $row['gen'], 'tip' => $row['tip'], 'categorie' => $row['categorie'], 'culoare' => $row['culoare'], 'nr_accesari' => $row['nr_accesari']
            );
            $this->db->insert('produse_filter_order', $insert_data);
        }

        $result = $this->db->selectOrderBy2('produse_filter_order', 'gen', $gender, 'categorie', $category, $order, $filter);
        $count = 0;
        while ($result->fetch()) {
            $count = $count + 1;
        }
        return $this->db->selectOrderBy2('produse_filter_order', 'gen', $gender, 'categorie', $category, $order, $filter);
    }

    /**
     * functia returneaza toate datele despre produsul specificat in parametru(se cauta dupa id-ul produsului) din tabela produse 
     */
    public function selectProduct($id_product)
    {
        return $this->db->select1('produse', 'id_produs', $id_product);
    }
  
    /**
     * functia returneaza cantitatea din stock , din tabela de marimi, a produsului cu id-ul si marimea specificate ca si parametrii
     */
    public function selectCountProduct($id_product, $size)
    {
        $result = $this->db->select2('marimi', 'id_produs', $id_product, 'marime', $size);
        $row = $result->fetch();
        return $row['cantitate'];
    }

  /**
     * functia returneaza produsele dupa aplicarea filtrelor preluate de pe front , care au fost introduse de utilizator ,
     * iar daca un filtru nu a fost bifat , acesta va fi setat pe false
     */
    public function selectByFilter($category, $material, $marime, $tip, $gen, $culoare, $pret, &$count)
    {
        $result = $this->db->selectJoin7('produse', 'marimi', 'id_produs', 'categorie', $category, 'material', $material, 'marime', $marime, 'tip', $tip, 'gen', $gen, 'culoare', $culoare, 'pret', $pret);
        $count = 0;
        while ($result->fetch()) {
            $count = $count + 1;
        }
        return $this->db->selectJoin7('produse', 'marimi', 'id_produs', 'categorie', $category, 'material', $material, 'marime', $marime, 'tip', $tip, 'gen', $gen, 'culoare', $culoare, 'pret', $pret);
    }

    /**
     * functia returneaza produsele dupa aplicarea filtrelor preluate de pe front , care au fost introduse de utilizator ,
     * cu exceptia filter-ului de marime , iar daca un filtru nu a fost bifat , acesta va fi setat pe false
     */
    public function selectByFilterWithoutSize($category, $material, $tip, $gen, $culoare, $pret, &$count)
    {

        $result = $this->db->select6('produse', 'categorie', $category, 'material', $material, 'tip', $tip, 'gen', $gen, 'culoare', $culoare, 'pret', $pret);
        $count = 0;
        while ($result->fetch()) {
            $count = $count + 1;
        }
        return $this->db->select6('produse', 'categorie', $category, 'material', $material, 'tip', $tip, 'gen', $gen, 'culoare', $culoare, 'pret', $pret);
    }

   /**
    * functia face un delete in tabela "produse " , astfel se sterge produsul al carui id este odferit ca si parametru
    */
    public function deteleProduct($id_product)
    {
        return $this->db->delete1('produse', 'id_produs', $id_product);
    }

    /**
     * functia face un delete asupra tabelei  "produse_filter_order" , astfel se sterg din tabela toate inregistrarile
     */
    public function deleteFromProduse_filter_order()
    {
        return $this->db->deleteAll('produse_filter_order');
    }

    /**
     * functia returneaza valoarea din coloana cu numarul de accesari a produsului specificat ca si parametru (cautarea se face dupa id-ul produsului )
     */
    public function nrAccesariCurente($id_product)
    {
        $result = $this->db->select1('produse', 'id_produs', $id_product);
        $row = $result->fetch();
        return $row['nr_accesari'];
    }

    /**
     * functia face un update asupra coloanei cu numarul de accesari al produsului specificat ca si parametru 
     * aceasta functie este apelata la orice accesare a paginii unui produs , crescand numarul de accesari
     */
    public function cresteNrAccesari($nr_accesari, $id_product)
    {
        return $this->db->update('produse', 'nr_accesari', $nr_accesari, 'id_produs', $id_product);
    }
}
