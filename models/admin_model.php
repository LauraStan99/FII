<?php
class Admin_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * selectez toate produsele din tabela produse 
     */
    public function selectAllProducts($start_from, $limit)
    {
        return $this->db->selectLimit('produse', $start_from, $limit);
    }

    /**
     * calculez numarul de linii din tabela produse si il returnez
     */
    public function selectCountProducts()
    {
        $result = $this->db->selectCountSimple('produse');
        $row = $result->fetch();
        return $row['count(*)'];
    }

    /**
     * calculez numarul de linii din tabela utilizatori si il returnez
     */
    public function selectCountUsers()
    {
        $result = $this->db->selectCountSimple('utilizatori');
        $row = $result->fetch();
        return $row['count(*)'];
    }

    /**
     * sterg din tabela produse produsul care are id_produs cel dat ca parametru
     */
    public function deleteProduct($id_product)
    {
        return $this->db->delete1('produse', 'id_produs', $id_product);
    }

    /**
     * selectez toate liniile din tabela utilizatori
     */
    public function selectAllUsers($start_from, $limit)
    {
        return $this->db->selectLimitWhere('utilizatori', $start_from, $limit, 'tip_utilizator', 'user');
    }

    /**
     *  sterg din tabela utilizatori utilizatorul care are id_utilizator cel dat ca parametru
     */
    public function deleteUser($id_user)
    {
        return $this->db->delete1('utilizatori', 'id_utilizator', $id_user);
    }

    /**
     * inserez un nou produs in tabela produse
     */
    public function insertNewProduct($data)
    {
        return $this->db->insert('produse', $data);
    }

    /**
     * caut produsul cu id-ul dat ca parametru in tabela produse
     * in acelasi timp si calculez cate linii sunt returnate pentru select-ul anterior
     */
    public function selectProductById($id)
    {
        $result = $this->db->select1('produse', 'id_produs', $id);
        $count = $this->db->selectCount('produse', 'id_produs', $id);
        $row = $count->fetch();
        if ($row['count(*)'] == 0) return false;
        else return $result;
    }

    /**
     * updatez in tabela produse campul nume cu numele dat ca parametru pentru produsul care are id-ul dat ca parametru
     */
    public function updateProductName($name, $id)
    {
        return $this->db->update('produse', 'nume', $name, 'id_produs', $id);
    }

    /**
     * updatez in tabela produse campul pret cu pretul dat ca parametru pentru produsul care are id-ul dat ca parametru
     */
    public function updateProductPrice($price, $id)
    {
        return $this->db->update('produse', 'pret', $price, 'id_produs', $id);
    }

    /**
     * updatez in tabela produse campul material cu materialul dat ca parametru pentru produsul care are id-ul dat ca parametru
     */
    public function updateProductMaterial($material, $id)
    {
        return $this->db->update('produse', 'material', $material, 'id_produs', $id);
    }

    /**
     * updatez in tabela produse campul imagine cu imaginea data ca parametru pentru produsul care are id-ul dat ca parametru
     */
    public function updateProductImage($image, $id)
    {
        return $this->db->update('produse', 'imagine', $image, 'id_produs', $id);
    }

    /**
     * updatez in tabela produse campul desciere cu descrierea data ca parametru pentru produsul care are id-ul dat ca parametru
     */
    public function updateProductDescription($description, $id)
    {
        return $this->db->update('produse', 'descriere', $description, 'id_produs', $id);
    }

    /**
     * updatez in tabela produse campul gen cu genul dat ca parametru pentru produsul care are id-ul dat ca parametru
     */
    public function updateProductGender($gender, $id)
    {
        return $this->db->update('produse', 'gen', $gender, 'id_produs', $id);
    }

    /**
     * updatez in tabela produse campul tip cu tipul dat ca parametru pentru produsul care are id-ul dat ca parametru
     */
    public function updateProductType($tipe, $id)
    {
        return $this->db->update('produse', 'tip', $tipe, 'id_produs', $id);
    }

    /**
     * updatez in tabela produse campul categorie cu categoria data ca parametru pentru produsul care are id-ul dat ca parametru
     */
    public function updateProductCategory($category, $id)
    {
        return $this->db->update('produse', 'categorie', $category, 'id_produs', $id);
    }

    /**
     * updatez in tabela produse campul culoare cu culoarea data ca parametru pentru produsul care are id-ul dat ca parametru
     */
    public function updateProductColor($color, $id)
    {
        return $this->db->update('produse', 'culoare', $color, 'id_produs', $id);
    }

    /**
     * selectez datele pentru statistica comenzilor
     * datele sunt preluate din tabela comanda
     */
    public function selectStatisticaComenzi()
    {
        return $this->db->selectGroupBy('comanda', 'data_plasare');
    }

    /**
     * selectez datele pentru statistica produselor de femei achizitionate
     * datele sunt preluate din tabela produse_comanda
     */
    public function selectStatisticaProduseFemei()
    {
        return $this->db->selectJoinGroupByWhere('produse_comanda', 'produse', 'categorie', 'id_produs', 'gen', 'femei');
    }

    /**
     * selectez datele pentru statistica celor mai populare produse
     * datele sunt preluate din tabela produse
     * si sunt afisate dupa numarul de accesari in ordine descrescatoare
     */
    public function selectStatisticaProdusePopulare()
    {
        return $this->db->selectOrderBy1Limit('produse', 'nume', 'nr_accesari', 'nr_accesari', 'desc', 10);
    }

    /**
     * selectez datele pentru statistica comenzilor in functie de metoda de plata cash/card
     */
    public function selectStatisticaPlataComenzi()
    {
        return $this->db->selectGroupBy('comanda', 'metoda_plata');
    }

    /**
     * selectez datele pentru statistica comenzilor in functie de tara de livrare din Europa
     */
    public function selectStatisticaComenziEuropa()
    {
        return $this->db->selectGroupBy('comanda', 'tara');
    }

    /**
     * creez csv ul cu datele preluate din select-ul pentru statistica comenzilor efectuate in functie de zile
     * incepand cu luna mai
     * setam tipul fisierului pe care dorim sa il cream ("Content-Type: text/csv")
     * ii setam proprietatea de scriere in fisier ('W') deschizand-ul si populandu-l cu datele abia preluate
     * 
     */
    public function createCsvStatisticaComenzi()
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('DATA PLASARE', 'NUMAR PRODUSE'));
        $result = $this->selectStatisticaComenzi();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            fputcsv($output, $row);
        }
        fclose($output);
    }

    /**
     * creez csv ul cu datele preluate din select-ul pentru statistica comenzilor din Europa
     * setam tipul fisierului pe care dorim sa il cream ("Content-Type: text/csv")
     * ii setam proprietatea de scriere in fisier ('W') deschizand-ul si populandu-l cu datele abia preluate
     * 
     */
    public function createCsvStatisticaComenziEuropa()
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('TARA', 'NUMAR COMENZI LIVRATE'));
        $result = $this->selectStatisticaComenziEuropa();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            fputcsv($output, $row);
        }
        fclose($output);
    }

    /**
     * creez csv ul cu datele preluate din select-ul pentru statistica comenzilor efectuate in functie de metoda de plata aleasa
     * setam tipul fisierului pe care dorim sa il cream ("Content-Type: text/csv")
     * ii setam proprietatea de scriere in fisier ('W') deschizand-ul si populandu-l cu datele abia preluate
     * 
     */
    public function createCsvStatisticaPlataComenzi()
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('MODALITATE PLATA', 'NUMAR COMENZI'));
        $result = $this->selectStatisticaPlataComenzi();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            fputcsv($output, $row);
        }
        fclose($output);
    }

    /**
     * creez csv ul cu datele preluate din select-ul pentru statistica comenzilor in functie de cele mai achizitionate subcategorii de produse de femei
     * setam tipul fisierului pe care dorim sa il cream ("Content-Type: text/csv")
     * ii setam proprietatea de scriere in fisier ('W') deschizand-ul si populandu-l cu datele abia preluate
     * 
     */
    public function createCsvStatisticaProduseFemei()
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('CATEGORIE PRODUSE FEMEI', 'NUMAR ARTICOLE CUMPARATE'));
        $result = $this->selectStatisticaProduseFemei();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            fputcsv($output, $row);
        }
        fclose($output);
    }

    /**
     * creez csv ul cu datele preluate din select-ul pentru statistica celor mai populare produse din aplicatie
     * setam tipul fisierului pe care dorim sa il cream ("Content-Type: text/csv")
     * ii setam proprietatea de scriere in fisier ('W') deschizand-ul si populandu-l cu datele abia preluate
     * 
     */
    public function createCsvStatisticaCeleMaiPopulareProduse()
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('DENUMIRE PRODUS', 'POPULARITATE'));
        $result = $this->selectStatisticaProdusePopulare();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            fputcsv($output, $row);
        }
        fclose($output);
    }
}
