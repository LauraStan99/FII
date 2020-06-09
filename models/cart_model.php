<?php
class Cart_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * functia returneaza produsele aflate in cosul de cumparaturi al unui utilizator logat , al carui id este preluat din sesiune
     */
    public function selectCartProducts()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $id = Session::get('id_utilizator');
        return $result = $this->db->selectJoin('cos', 'produse', 'id_produs', 'id_produs', 'id_utilizator', $id);
    }

    /**
     * pentru un utilizator logat , al carui id este preluat din sesiune se face totalul cosului de cumparaturi din sesiune
     */
    public function selectCartTotalPrice()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $id = Session::get('id_utilizator');
        $result = $this->db->select1('cos', 'id_utilizator', $id);
        $total = 0;
        while ($row = $result->fetch()) {
            $total = $total + $row['pretTotal'];
        }
        return $total;
    }

    /**
     * in momentul in care este actionat butonul de plasare a comenzii toate produsele din cos sunt adaugate in tabela "produse_comanda" 
     * ordonate dupa id descrescator, stabilind astfel si id-ul posibilei comenzi respective
     */
    public function addToCommand()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $id = Session::get('id_utilizator');
        $result = $this->db->select1('cos', 'id_utilizator', $id);
        $result_id_command = $this->db->selectOrderBy('produse_comanda', 'id_comanda', 'desc');
        $row_id_command = $result_id_command->fetch();
        $id_command = $row_id_command['id_comanda'] + 1;
        while ($row = $result->fetch()) {
            $insert_data = array(
                'id_comanda' => $id_command, 'id_produs' => $row['id_produs'], 'cantitate' => $row['cantitate'], 'pret' => $row['pretTotal'], 'id_utilizator' => $id, 'marime' => $row['marime']
            );
            $this->db->insert('produse_comanda', $insert_data);
        }
    }

    /**
     * functia returneaza pentru un utilizator logat , al carui id este preluat din sesiune
     * id-ul celei mai recente comenzi realizate de acesta
     */
    public function selectIdComanda()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $id = Session::get('id_utilizator');
        $result = $this->db->selectOrderBy1('produse_comanda', 'id_utilizator', $id, 'id_comanda', 'desc');
        $row = $result->fetch();
        return $row['id_comanda'];
    }
}
