<?php

class Cauta_model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * functia returneaza produsele din tabela "produse_filter_order"  in limita permisa avand praguri de returnare $start_from si  $limit 
     */
    public function selectSearch($start_from, $limit)
    {

        return $this->db->selectLimit('produse_filter_order', $start_from, $limit);
    }

    /**
     * functia returneaza numarul de produse existente in tabela "produse_filter_order"
     */
    public function count()
    {
        $result = $this->db->selectCountSimple('produse_filter_order');
        $row = $result->fetch();
        return $row['count(*)'];
    }

    /**
     * functia returneaza, in limita permisa avand praguri de returnare $start_from si  $limit ,
     * produsele din baza de date in functie de cuvantul cheie introdus de catre utilizator in searchbar
     */
    public function searchByWord($word, $start_from, $limit)
    {
        $this->deleteFromProduse_filter_order();
        $result =  $this->db->selectSearch6('produse', $word, 'nume', 'material', 'descriere', 'tip', 'culoare', 'categorie');
        while ($row = $result->fetch()) {
            $insert_data = array(
                'id_produs' => $row['id_produs'], 'nume' => $row['nume'], 'pret' => $row['pret'], 'material' => $row['material'], 'imagine' => $row['imagine'], 'descriere' => $row['descriere'],
                'gen' => $row['gen'], 'tip' => $row['tip'], 'categorie' => $row['categorie'], 'culoare' => $row['culoare'], 'nr_accesari' => $row['nr_accesari']
            );
            $this->db->insert('produse_filter_order', $insert_data);
        }
        return $this->db->selectSearch6Limit('produse', $word, 'nume', 'material', 'descriere', 'tip', 'culoare', 'categorie', $start_from, $limit);
    }

    /**
     * functia returneaza numarul de produse gasite in baza de date in functie de cuvantul cheie introdul de catre utilizator in searchbar
     */
    public function countSearch($word)
    {
        $result = $this->db->selectSearch6('produse', $word, 'nume', 'material', 'descriere', 'tip', 'culoare', 'categorie');
        $i = 0;

        while ($result->fetch()) {
            $i = $i + 1;
        }
        return $i;
    }

    /**
     * functia returneaza produsele ordonate dupa coloana si filterul oferit ca si parametrii , avand o limita , pornind de la pragul $start_from
     * pana la pargul $limit , aceste praguri egasindu-se printre parametrii functiei 
     */
    public function sortare($filter, $order, $start_from, $limit)
    {

        $result = $this->db->selectOrderBy('produse_filter_order', $filter, $order);
        $this->deleteFromProduse_filter_order();
        while ($row = $result->fetch()) {
            $insert_data = array(
                'id_produs' => $row['id_produs'], 'nume' => $row['nume'], 'pret' => $row['pret'], 'material' => $row['material'], 'imagine' => $row['imagine'], 'descriere' => $row['descriere'],
                'gen' => $row['gen'], 'tip' => $row['tip'], 'categorie' => $row['categorie'], 'culoare' => $row['culoare'], 'nr_accesari' => $row['nr_accesari']
            );
            $this->db->insert('produse_filter_order', $insert_data);
        }
        return $this->db->selectOrderByLimit2('produse_filter_order', $filter, $order,  $start_from, $limit);
    }

    /**
     * functia face un delete asupra tabelei "produse_filter_order" , stergand toate inregistrarie din ea
     */
    public function deleteFromProduse_filter_order()
    {
        return $this->db->deleteAll('produse_filter_order');
    }
}
